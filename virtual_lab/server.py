#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Dual-Backend Python 3 HTTP Server & REST API for Virtual Physics for Microbiology Lab
Provides zero-dependency serving of static assets and SQLite3 REST API endpoints.
"""
import http.server
import socketserver
import urllib.parse
import json
import sqlite3
import os
import sys

PORT = 8089
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
DB_PATH = os.path.join(BASE_DIR, 'database', 'virtual_lab.db')

class LabApiHandler(http.server.SimpleHTTPRequestHandler):
    def __init__(self, *args, **kwargs):
        super().__init__(*args, directory=BASE_DIR, **kwargs)

    def _send_json(self, data, status=200):
        body = json.dumps(data, ensure_ascii=False).encode('utf-8')
        self.send_response(status)
        self.send_header('Content-Type', 'application/json; charset=utf-8')
        self.send_header('Access-Control-Allow-Origin', '*')
        self.send_header('Content-Length', str(len(body)))
        self.end_headers()
        self.wfile.write(body)

    def do_OPTIONS(self):
        self.send_response(200)
        self.send_header('Access-Control-Allow-Origin', '*')
        self.send_header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        self.send_header('Access-Control-Allow-Headers', 'Content-Type')
        self.end_headers()

    def do_GET(self):
        parsed = urllib.parse.urlparse(self.path)
        if parsed.path.startswith('/api'):
            params = urllib.parse.parse_qs(parsed.query)
            action = params.get('action', [''])[0]
            self.handle_api(action, params, {})
        else:
            super().do_GET()

    def do_POST(self):
        parsed = urllib.parse.urlparse(self.path)
        if parsed.path.startswith('/api'):
            params = urllib.parse.parse_qs(parsed.query)
            action = params.get('action', [''])[0]
            length = int(self.headers.get('Content-Length', 0))
            raw_body = self.rfile.read(length).decode('utf-8') if length > 0 else '{}'
            try:
                post_data = json.loads(raw_body)
            except Exception:
                post_data = urllib.parse.parse_qs(raw_body)
            self.handle_api(action, params, post_data)
        else:
            super().do_POST()

    def handle_api(self, action, params, post_data):
        if not os.path.exists(DB_PATH):
            self._send_json({'success': False, 'error': 'Database file not found'}, 500)
            return

        conn = sqlite3.connect(DB_PATH)
        conn.row_factory = sqlite3.Row
        cur = conn.cursor()

        try:
            if action == 'register_student':
                sid = str(post_data.get('student_id', '')).strip()
                pfx = str(post_data.get('prefix', '')).strip()
                fn = str(post_data.get('fullname', '')).strip()
                prg = str(post_data.get('program', 'จุลชีววิทยา')).strip()
                sec = str(post_data.get('section', 'Sec 01')).strip()
                em = str(post_data.get('email', '')).strip()
                ph = str(post_data.get('phone', '')).strip()

                if not sid or not fn:
                    self._send_json({'success': False, 'error': 'Missing student_id or fullname'}, 400)
                    return

                cur.execute("""
                INSERT INTO students (student_id, prefix, fullname, program, section, email, phone, last_active)
                VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
                ON CONFLICT(student_id) DO UPDATE SET
                    prefix=excluded.prefix, fullname=excluded.fullname, program=excluded.program,
                    section=excluded.section, email=excluded.email, phone=excluded.phone, last_active=CURRENT_TIMESTAMP
                """, (sid, pfx, fn, prg, sec, em, ph))
                conn.commit()

                cur.execute("SELECT * FROM students WHERE student_id = ?", (sid,))
                student = dict(cur.fetchone())
                self._send_json({'success': True, 'student': student})

            elif action == 'get_student_profile':
                sid = params.get('student_id', [''])[0]
                cur.execute("SELECT * FROM students WHERE student_id = ?", (sid,))
                row = cur.fetchone()
                if not row:
                    self._send_json({'success': False, 'error': 'Student not found'}, 404)
                    return
                student = dict(row)

                cur.execute("SELECT * FROM lab_reports WHERE student_id = ? ORDER BY submitted_at DESC", (sid,))
                reports = [dict(r) for r in cur.fetchall()]
                self._send_json({'success': True, 'student': student, 'reports': reports, 'total_submitted': len(reports)})

            elif action == 'submit_report':
                code = f"REP-{post_data.get('student_id')}-{post_data.get('lab_id').upper()}"
                tbl = json.dumps(post_data.get('table_data', []), ensure_ascii=False) if isinstance(post_data.get('table_data'), list) else str(post_data.get('table_data', '[]'))
                q_ans = json.dumps(post_data.get('quiz_answers', {}), ensure_ascii=False) if isinstance(post_data.get('quiz_answers'), dict) else str(post_data.get('quiz_answers', '{}'))

                cur.execute("""
                INSERT INTO lab_reports (
                    report_code, student_id, lab_id, table_data_json, error_percentage,
                    r_squared, post_quiz_score, post_quiz_total, quiz_answers_json,
                    conclusion, discussion, accuracy_score, status, submitted_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'submitted', CURRENT_TIMESTAMP)
                ON CONFLICT(report_code) DO UPDATE SET
                    table_data_json=excluded.table_data_json, error_percentage=excluded.error_percentage,
                    r_squared=excluded.r_squared, post_quiz_score=excluded.post_quiz_score,
                    post_quiz_total=excluded.post_quiz_total, quiz_answers_json=excluded.quiz_answers_json,
                    conclusion=excluded.conclusion, discussion=excluded.discussion,
                    accuracy_score=excluded.accuracy_score, status='resubmitted', submitted_at=CURRENT_TIMESTAMP
                """, (
                    code, post_data.get('student_id'), post_data.get('lab_id'), tbl,
                    float(post_data.get('error_percentage', 0.0)), float(post_data.get('r_squared', 0.0)),
                    int(post_data.get('post_quiz_score', 0)), int(post_data.get('post_quiz_total', 3)),
                    q_ans, post_data.get('conclusion', ''), post_data.get('discussion', ''),
                    float(post_data.get('accuracy_score', 100.0))
                ))
                conn.commit()
                self._send_json({'success': True, 'report_code': code, 'message': 'Report submitted successfully'})

            elif action == 'admin_login':
                u = post_data.get('username')
                p = post_data.get('password')
                cur.execute("SELECT * FROM admin_users WHERE username = ? AND password = ?", (u, p))
                admin = cur.fetchone()
                if admin:
                    self._send_json({'success': True, 'admin': {'username': admin['username'], 'fullname': admin['fullname']}})
                else:
                    self._send_json({'success': False, 'error': 'Invalid credentials'}, 401)

            elif action == 'admin_get_overview':
                cur.execute("SELECT * FROM students ORDER BY student_id ASC")
                students = [dict(s) for s in cur.fetchall()]
                cur.execute("""
                    SELECT r.*, s.fullname, s.section, s.program
                    FROM lab_reports r
                    JOIN students s ON r.student_id = s.student_id
                    ORDER BY r.submitted_at DESC
                """)
                reports = [dict(r) for r in cur.fetchall()]
                cur.execute("SELECT * FROM labs_catalog ORDER BY lab_number ASC")
                labs = [dict(l) for l in cur.fetchall()]
                self._send_json({'success': True, 'students': students, 'reports': reports, 'labs': labs, 'total_students': len(students), 'total_reports': len(reports)})

            else:
                self._send_json({'success': True, 'version': '2027.10', 'message': 'Python 3 SQLite REST API ready'})

        except Exception as e:
            self._send_json({'success': False, 'error': str(e)}, 500)
        finally:
            conn.close()

if __name__ == '__main__':
    print(f"Starting Virtual Lab Server at http://localhost:{PORT}")
    with socketserver.TCPServer(("", PORT), LabApiHandler) as httpd:
        try:
            httpd.serve_forever()
        except KeyboardInterrupt:
            print("\nShutting down server.")
