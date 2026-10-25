/**
 * Dual-Backend Database Client for Virtual Lab
 * Transparently manages REST API requests to PHP/Python SQLite3 backend,
 * and provides full LocalStorage / IndexedDB fallback for GitHub Pages & Offline mode.
 */

class DatabaseClient {
  constructor() {
    this.apiEndpoint = this.detectApiEndpoint();
    this.isOnlineBackend = false;
    this.initStorage();
    this.testBackendConnection();
  }

  detectApiEndpoint() {
    const loc = window.location;
    if (loc.protocol === 'file:') return null;
    // Check if hosted under XAMPP / PHP
    if (loc.pathname.includes('/virtual_lab/')) {
      return 'api/api.php';
    }
    return '/api';
  }

  async testBackendConnection() {
    if (!this.apiEndpoint) {
      this.isOnlineBackend = false;
      return;
    }
    try {
      const res = await fetch(`${this.apiEndpoint}?action=ping`, { method: 'GET', signal: AbortSignal.timeout(2000) });
      const data = await res.json();
      this.isOnlineBackend = data.success === true;
    } catch (e) {
      this.isOnlineBackend = false;
    }
    console.log(`[DatabaseClient] Backend mode: ${this.isOnlineBackend ? 'SQLite3 Server' : 'Client LocalStorage / Offline'}`);
  }

  initStorage() {
    if (!localStorage.getItem('vlab_students')) {
      // Seed default students
      const demoStudents = {
        "6604101001": {
          student_id: "6604101001",
          prefix: "นาย",
          fullname: "กิตติพงษ์ สมบัติเจริญ",
          program: "จุลชีววิทยา",
          faculty: "คณะวิทยาศาสตร์และเทคโนโลยี",
          university: "มหาวิทยาลัยราชภัฏรำไพพรรณี",
          section: "Sec 01",
          email: "kittipong.s@rbru.ac.th",
          phone: "081-234-5678",
          created_at: new Date().toISOString()
        },
        "6604101002": {
          student_id: "6604101002",
          prefix: "นางสาว",
          fullname: "ชลธิชา สุขเกษม",
          program: "จุลชีววิทยา",
          faculty: "คณะวิทยาศาสตร์และเทคโนโลยี",
          university: "มหาวิทยาลัยราชภัฏรำไพพรรณี",
          section: "Sec 01",
          email: "chonthicha.s@rbru.ac.th",
          phone: "082-345-6789",
          created_at: new Date().toISOString()
        }
      };
      localStorage.setItem('vlab_students', JSON.stringify(demoStudents));
    }

    if (!localStorage.getItem('vlab_reports')) {
      // Seed initial demo reports
      const demoReports = [
        {
          report_code: "REP-6604101001-LAB01",
          student_id: "6604101001",
          lab_id: "lab01",
          accuracy_score: 98.5,
          error_percentage: 0.10,
          r_squared: 0.9998,
          post_quiz_score: 3,
          post_quiz_total: 3,
          conclusion: "จากการสอบเทียบไมโครปิเปต P1000 มวลของน้ำบริสุทธิ์สอดคล้องตามทฤษฎี ความคลาดเคลื่อนเฉลี่ย 0.10% ผ่านเกณฑ์มาตรฐาน ISO 8655",
          discussion: "สาเหตุความคลาดเคลื่อนเล็กน้อยเกิดจากอุณหภูมิห้องแล็บและแรงตึงผิวที่ปลายทิป",
          instructor_score: 9.8,
          instructor_feedback: "ผลการทดลองแม่นยำมาก เทคนิคการดูดปล่อยของเหลวนิ่งสม่ำเสมอ",
          status: "graded",
          submitted_at: "2026-10-25 09:30:00"
        },
        {
          report_code: "REP-6604101001-LAB04",
          student_id: "6604101001",
          lab_id: "lab04",
          accuracy_score: 99.0,
          error_percentage: 0.00,
          r_squared: 1.0000,
          post_quiz_score: 3,
          post_quiz_total: 3,
          conclusion: "เมื่อเพิ่มรอบเป็น 2 เท่า ค่า RCF เพิ่มขึ้นเป็น 4 เท่า การถ่วงสมดุลตรงข้าม 180 องศาทำให้เครื่องทำงานปลอดภัย 100%",
          discussion: "การคำนวณ RCF สอดคล้องกับขนาดรัศมีโรเตอร์จริง",
          instructor_score: 10.0,
          instructor_feedback: "ยอดเยี่ยมมาก เข้าใจฟิสิกส์แรงเหวี่ยงหนีศูนย์กลางอย่างดี",
          status: "graded",
          submitted_at: "2026-10-25 10:45:00"
        },
        {
          report_code: "REP-6604101001-LAB12",
          student_id: "6604101001",
          lab_id: "lab12",
          accuracy_score: 97.5,
          error_percentage: 0.45,
          r_squared: 0.9995,
          post_quiz_score: 3,
          post_quiz_total: 3,
          conclusion: "กราฟมาตรฐาน OD600 มีความเป็นเส้นตรงสูงมาก ตัวอย่าง Unknown อ่านค่าได้ 0.476 คำนวณความเข้มข้นได้ 51.5%",
          discussion: "การเช็ดผิวคิวเวตต์ให้สะอาดช่วยป้องกันการกระเจิงแสงได้อย่างมีนัยสำคัญ",
          instructor_score: 9.7,
          instructor_feedback: "สมการเส้นตรงถูกต้อง กราฟมาตรฐานสวยงาม",
          status: "graded",
          submitted_at: "2026-10-25 11:20:00"
        }
      ];
      localStorage.setItem('vlab_reports', JSON.stringify(demoReports));
    }
  }

  async registerStudent(studentData) {
    if (this.isOnlineBackend && this.apiEndpoint) {
      try {
        const res = await fetch(`${this.apiEndpoint}?action=register_student`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(studentData)
        });
        const result = await res.json();
        if (result.success) {
          this.saveLocalStudent(result.student);
          return result;
        }
      } catch (e) {
        console.warn('[DatabaseClient] Falling back to local storage', e);
      }
    }

    // Local Storage fallback
    const student = {
      ...studentData,
      created_at: new Date().toISOString(),
      last_active: new Date().toISOString()
    };
    this.saveLocalStudent(student);
    return { success: true, message: 'เข้าสู่ระบบสำเร็จ (Offline/Local)', student };
  }

  saveLocalStudent(student) {
    const students = JSON.parse(localStorage.getItem('vlab_students') || '{}');
    students[student.student_id] = student;
    localStorage.setItem('vlab_students', JSON.stringify(students));
    localStorage.setItem('vlab_active_student', JSON.stringify(student));
  }

  getActiveStudent() {
    const raw = localStorage.getItem('vlab_active_student');
    return raw ? JSON.parse(raw) : null;
  }

  logoutStudent() {
    localStorage.removeItem('vlab_active_student');
  }

  async getStudentProfile(studentId) {
    if (this.isOnlineBackend && this.apiEndpoint) {
      try {
        const res = await fetch(`${this.apiEndpoint}?action=get_student_profile&student_id=${studentId}`);
        const result = await res.json();
        if (result.success) return result;
      } catch (e) {
        console.warn('[DatabaseClient] Fallback to local profile', e);
      }
    }

    const students = JSON.parse(localStorage.getItem('vlab_students') || '{}');
    const student = students[studentId] || null;
    const allReports = JSON.parse(localStorage.getItem('vlab_reports') || '[]');
    const reports = allReports.filter(r => r.student_id === studentId);

    return {
      success: !!student,
      student,
      reports,
      total_submitted: reports.length
    };
  }

  async submitLabReport(reportData) {
    if (this.isOnlineBackend && this.apiEndpoint) {
      try {
        const res = await fetch(`${this.apiEndpoint}?action=submit_report`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(reportData)
        });
        const result = await res.json();
        if (result.success) {
          this.saveLocalReport(reportData, result.report_code);
          return result;
        }
      } catch (e) {
        console.warn('[DatabaseClient] Submit report local fallback', e);
      }
    }

    const code = `REP-${reportData.student_id}-${reportData.lab_id.toUpperCase()}`;
    this.saveLocalReport(reportData, code);
    return {
      success: true,
      message: 'ส่งรายงานผลปฏิบัติการสำเร็จเรียบร้อย',
      report_code: code,
      timestamp: new Date().toLocaleString('th-TH')
    };
  }

  saveLocalReport(reportData, code) {
    const reports = JSON.parse(localStorage.getItem('vlab_reports') || '[]');
    const existingIndex = reports.findIndex(r => r.report_code === code);
    const item = {
      ...reportData,
      report_code: code,
      submitted_at: new Date().toISOString().replace('T', ' ').substring(0, 19),
      status: 'submitted'
    };

    if (existingIndex >= 0) {
      reports[existingIndex] = item;
    } else {
      reports.push(item);
    }
    localStorage.setItem('vlab_reports', JSON.stringify(reports));
  }

  async adminLogin(username, password) {
    if (this.isOnlineBackend && this.apiEndpoint) {
      try {
        const res = await fetch(`${this.apiEndpoint}?action=admin_login`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ username, password })
        });
        return await res.json();
      } catch (e) {
        console.warn('[DatabaseClient] Admin login local fallback', e);
      }
    }

    // Default admin credential
    if (username === 'admin' && password === 'LEQs') {
      return {
        success: true,
        admin: { username: 'admin', fullname: 'ผศ.ดร.ชีวะ ทัศนา (อาจารย์ผู้สอน)' }
      };
    }
    return { success: false, error: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง (ค่ามาตรฐาน: admin / LEQs)' };
  }

  async adminGetOverview() {
    if (this.isOnlineBackend && this.apiEndpoint) {
      try {
        const res = await fetch(`${this.apiEndpoint}?action=admin_get_overview`);
        const result = await res.json();
        if (result.success) return result;
      } catch (e) {
        console.warn('[DatabaseClient] Admin overview local fallback', e);
      }
    }

    const studentsMap = JSON.parse(localStorage.getItem('vlab_students') || '{}');
    const students = Object.values(studentsMap);
    const reports = JSON.parse(localStorage.getItem('vlab_reports') || '[]');

    return {
      success: true,
      students,
      reports,
      total_students: students.length,
      total_reports: reports.length
    };
  }

  async instructorGrade(reportCode, score, feedback) {
    if (this.isOnlineBackend && this.apiEndpoint) {
      try {
        const res = await fetch(`${this.apiEndpoint}?action=instructor_grade`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ report_code: reportCode, score, feedback })
        });
        const result = await res.json();
        if (result.success) return result;
      } catch (e) {}
    }

    const reports = JSON.parse(localStorage.getItem('vlab_reports') || '[]');
    const idx = reports.findIndex(r => r.report_code === reportCode);
    if (idx >= 0) {
      reports[idx].instructor_score = score;
      reports[idx].instructor_feedback = feedback;
      reports[idx].status = 'graded';
      localStorage.setItem('vlab_reports', JSON.stringify(reports));
      return { success: true, message: 'บันทึกคะแนนและข้อเสนอแนะเรียบร้อยแล้ว' };
    }
    return { success: false, error: 'Report not found' };
  }
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = DatabaseClient;
}
