/**
 * Master Application Controller for Physics for Microbiology 3D Virtual Lab
 * Manages State, UI, Parameter Binding, Report Generation, Analytics & Admin Portal
 */

class AppController {
  constructor() {
    this.db = new DatabaseClient();
    this.sim = null;
    this.currentLab = LABS_CONFIG.lab01;
    this.activeStudent = null;
    this.currentTrials = [];
    this.currentParams = {};

    this.init();
  }

  async init() {
    // 1. Initialize 3D Engine
    this.sim = new Sim3DEngine("sim3dCanvasContainer", "oscCanvas");

    // 2. Check Active Student Session
    this.activeStudent = this.db.getActiveStudent();
    this.updateUserBadge();

    // 3. Render Labs Sidebar List
    this.renderLabsList();

    // 4. Load Initial Lab (Lab 01)
    this.selectLab("lab01");

    // 5. Setup Event Listeners
    this.bindEvents();

    // 6. Check if returning student
    if (!this.activeStudent) {
      this.openAuthModal();
    }
  }

  updateUserBadge() {
    const userContainer = document.getElementById("activeUserPill");
    if (!userContainer) return;

    if (this.activeStudent) {
      userContainer.innerHTML = `
        <div class="flex items-center gap-2 bg-slate-800/80 border border-emerald-500/40 px-3 py-1.5 rounded-full shadow-lg">
          <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-400 flex items-center justify-center text-slate-950 font-bold text-xs">
            ${this.activeStudent.prefix ? this.activeStudent.prefix[0] : 'S'}
          </div>
          <div class="text-left text-xs">
            <div class="font-bold text-emerald-300 leading-tight">${this.activeStudent.fullname}</div>
            <div class="text-[10px] text-slate-400">รหัส: ${this.activeStudent.student_id} (${this.activeStudent.section})</div>
          </div>
          <button id="btnLogout" class="text-slate-400 hover:text-rose-400 text-xs ml-1" title="ออกจากระบบ">
            <i class="fa-solid fa-right-from-bracket"></i>
          </button>
        </div>
      `;
      document.getElementById("btnLogout")?.addEventListener("click", () => this.logout());
    } else {
      userContainer.innerHTML = `
        <button id="btnLogin" class="flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-xs px-4 py-2 rounded-full shadow-lg shadow-emerald-900/40 transition-transform active:scale-95">
          <i class="fa-solid fa-user-plus"></i> ลงทะเบียน / เข้าสู่ระบบ
        </button>
      `;
      document.getElementById("btnLogin")?.addEventListener("click", () => this.openAuthModal());
    }
  }

  renderLabsList() {
    const listContainer = document.getElementById("labsListContainer");
    if (!listContainer) return;

    listContainer.innerHTML = "";
    Object.values(LABS_CONFIG).forEach(lab => {
      const btn = document.createElement("button");
      btn.id = `btnLab_${lab.id}`;
      btn.className = `w-full text-left p-3 rounded-xl transition-all border flex items-center gap-3 ${lab.id === this.currentLab.id ? 'bg-emerald-500/15 border-emerald-500/60 text-white shadow-lg shadow-emerald-950/40' : 'bg-slate-900/50 border-slate-800/80 text-slate-300 hover:bg-slate-800/70 hover:border-slate-700'}`;
      btn.innerHTML = `
        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-slate-800 border border-slate-700 text-emerald-400 shrink-0">
          <i class="${lab.icon} text-sm"></i>
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex items-center justify-between gap-1">
            <span class="text-[11px] font-bold text-emerald-400 tracking-wider uppercase">${lab.badge}</span>
            <span class="text-[10px] text-slate-400 truncate">${lab.category}</span>
          </div>
          <div class="text-xs font-semibold text-slate-200 truncate">${lab.titleTh}</div>
        </div>
      `;
      btn.addEventListener("click", () => this.selectLab(lab.id));
      listContainer.appendChild(btn);
    });
  }

  selectLab(labId) {
    const lab = LABS_CONFIG[labId];
    if (!lab) return;
    this.currentLab = lab;

    // Highlight button in sidebar
    document.querySelectorAll("[id^='btnLab_']").forEach(el => {
      el.className = el.id === `btnLab_${labId}`
        ? "w-full text-left p-3 rounded-xl transition-all border flex items-center gap-3 bg-emerald-500/15 border-emerald-500/60 text-white shadow-lg shadow-emerald-950/40"
        : "w-full text-left p-3 rounded-xl transition-all border flex items-center gap-3 bg-slate-900/50 border-slate-800/80 text-slate-300 hover:bg-slate-800/70 hover:border-slate-700";
    });

    // Update Header
    document.getElementById("labBadge").textContent = lab.badge;
    document.getElementById("labCategory").textContent = lab.category;
    document.getElementById("labTitleTh").textContent = lab.titleTh;
    document.getElementById("labTitleEn").textContent = lab.titleEn;
    document.getElementById("labInstrument").textContent = lab.instrument;
    document.getElementById("labDescription").textContent = lab.description;
    document.getElementById("labFormulaDesc").textContent = lab.formulaDesc;

    // Update Two-Way Navigation Links to Chapters, Labs & Standalone 3D Simulators
    const labNum = lab.num;
    const numStr = String(labNum).padStart(2, '0');
    
    const theoryBtn = document.getElementById("btnTheoryLink");
    if (theoryBtn) {
      theoryBtn.href = `../03_physics4microbio2026/chapters/ch${numStr}_th.php`;
      theoryBtn.innerHTML = `<i class="fa-solid fa-book-bookmark"></i> <span>📖 อ่านทฤษฎีบทที่ ${labNum}</span>`;
    }

    const reportBtn = document.getElementById("btnReportLink");
    if (reportBtn) {
      const labFiles = [
        'lab01_measurement.php', 'lab02_vectors.php', 'lab03_motion.php', 'lab04_newton.php',
        'lab05_heat_incubator.php', 'lab06_equilibrium.php', 'lab07_energy.php', 'lab08_machines.php',
        'lab09_heat.php', 'lab10_electricity.php', 'lab11_optics.php', 'lab12_radioactivity.php'
      ];
      if (labNum <= 12) {
        reportBtn.style.display = 'inline-flex';
        reportBtn.href = `../03_physics4microbio2026/labs/${labFiles[labNum - 1]}`;
        reportBtn.innerHTML = `<i class="fa-solid fa-file-pen"></i> <span>📝 ส่งรายงาน Lab ${numStr}</span>`;
      } else {
        reportBtn.style.display = 'none';
      }
    }

    const simFullBtn = document.getElementById("btnSimFullscreen");
    if (simFullBtn) {
            const simFiles = [
        'sim_micropipette_3d.html',
        'sim02_brownian_motion_3d.html',
        'sim03_viscometer_3d.html',
        'sim04_centrifuge_3d.html',
        'sim05_incubator_3d.html',
        'sim06_autoclave_3d.html',
        'sim07_gram_stain_3d.html',
        'sim10_electrophoresis_3d.html',
        'sim09_refraction_3d.html',
        'sim11_optics_3d.html',
        'sim12_radioactivity_3d.html',
        'sim12_od600_3d.html',
        'sim12_od600_3d.html'
      ];
      if (labNum <= 12) {
        simFullBtn.style.display = 'inline-flex';
        simFullBtn.href = simFiles[labNum - 1];
        simFullBtn.innerHTML = `<i class="fa-solid fa-expand"></i> <span>🥽 เปิด 3D เต็มจอ ↗</span>`;
      } else {
        simFullBtn.style.display = 'none';
      }
    }

    const formulaEl = document.getElementById("labFormulaLatex");
    if (formulaEl) {
      formulaEl.innerHTML = `\\[ ${lab.formulaLatex} \\]`;
      if (window.MathJax && MathJax.typesetPromise) {
        MathJax.typesetPromise([formulaEl]);
      }
    }

    // Initialize Default Parameters
    this.currentParams = {};
    lab.params.forEach(p => {
      this.currentParams[p.id] = p.default ?? (p.options ? p.options[0].val : 0);
    });

    // Render Parameter Controls
    this.renderParamsControls();

    // Render Data Table
    this.currentTrials = JSON.parse(JSON.stringify(lab.defaultTrials || []));
    this.renderDataTable();

    // Render Post-Lab Quiz
    this.renderQuiz();

    // Load 3D Apparatus
    this.sim.loadLabApparatus(lab.id, this.currentParams);

    // Run Initial Physics Calculation & Update Telemetry
    this.updatePhysicsTelemetry();
  }

  renderParamsControls() {
    const container = document.getElementById("paramsContainer");
    if (!container) return;
    container.innerHTML = "";

    this.currentLab.params.forEach(p => {
      const wrapper = document.createElement("div");
      wrapper.className = "bg-slate-900/70 border border-slate-800/80 rounded-xl p-3 space-y-1.5";

      if (p.type === "select") {
        wrapper.innerHTML = `
          <label class="text-xs font-semibold text-slate-300 block">${p.label}</label>
          <select id="param_${p.id}" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-200 focus:outline-none focus:border-emerald-500">
            ${p.options.map(opt => `<option value="${opt.val}" ${this.currentParams[p.id] === opt.val ? 'selected' : ''}>${opt.text}</option>`).join("")}
          </select>
        `;
        container.appendChild(wrapper);

        const selectEl = wrapper.querySelector(`#param_${p.id}`);
        selectEl.addEventListener("change", (e) => {
          this.currentParams[p.id] = e.target.value;
          this.onParamChange();
        });
      } else {
        wrapper.innerHTML = `
          <div class="flex items-center justify-between">
            <label class="text-xs font-semibold text-slate-300">${p.label}</label>
            <span id="val_${p.id}" class="text-xs font-mono font-bold text-emerald-400 bg-emerald-950/60 px-2 py-0.5 rounded border border-emerald-500/30">
              ${this.currentParams[p.id]} ${p.unit || ''}
            </span>
          </div>
          <input type="range" id="param_${p.id}" min="${p.min}" max="${p.max}" step="${p.step}" value="${this.currentParams[p.id]}"
                 class="w-full accent-emerald-500 h-1.5 bg-slate-800 rounded-lg appearance-none cursor-pointer">
        `;
        container.appendChild(wrapper);

        const rangeEl = wrapper.querySelector(`#param_${p.id}`);
        const valEl = wrapper.querySelector(`#val_${p.id}`);
        rangeEl.addEventListener("input", (e) => {
          this.currentParams[p.id] = parseFloat(e.target.value);
          valEl.textContent = `${this.currentParams[p.id]} ${p.unit || ''}`;
          this.onParamChange();
        });
      }
    });
  }

  onParamChange() {
    this.updatePhysicsTelemetry();
    this.sim.loadLabApparatus(this.currentLab.id, this.currentParams);
  }

  updatePhysicsTelemetry() {
    if (!this.currentLab || !this.currentLab.calcPhysics) return;
    const res = this.currentLab.calcPhysics(this.currentParams);
    const container = document.getElementById("telemetryGrid");
    if (!container) return;

    container.innerHTML = "";
    Object.entries(res).forEach(([key, val]) => {
      const card = document.createElement("div");
      card.className = "bg-slate-900/80 border border-slate-800 rounded-xl p-2.5 flex flex-col justify-between";
      card.innerHTML = `
        <div class="text-[10px] text-slate-400 uppercase tracking-wider">${key.replace(/_/g, ' ')}</div>
        <div class="text-xs font-mono font-bold text-sky-300 mt-1 truncate" title="${val}">${val}</div>
      `;
      container.appendChild(card);
    });
  }

  renderDataTable() {
    const tableHead = document.getElementById("dataTableHead");
    const tableBody = document.getElementById("dataTableBody");
    if (!tableHead || !tableBody) return;

    tableHead.innerHTML = `<tr>${this.currentLab.tableCols.map(c => `<th class="px-3 py-2 text-left font-bold text-slate-300 border-b border-slate-800">${c}</th>`).join("")}</tr>`;

    tableBody.innerHTML = "";
    this.currentTrials.forEach((t, idx) => {
      const row = document.createElement("tr");
      row.className = "hover:bg-slate-800/40 border-b border-slate-800/50 font-mono text-xs";
      row.innerHTML = `
        <td class="px-3 py-2 text-slate-400 font-bold">${t.trial}</td>
        <td class="px-3 py-2 text-slate-200">${t.p1}</td>
        <td class="px-3 py-2 text-slate-200">${t.p2}</td>
        <td class="px-3 py-2 text-slate-200">${t.p3}</td>
        <td class="px-3 py-2 text-slate-200">${t.p4}</td>
        <td class="px-3 py-2 font-bold ${parseFloat(t.err) > 5 ? 'text-amber-400' : 'text-emerald-400'}">${t.err}</td>
      `;
      tableBody.appendChild(row);
    });
  }

  capture3DMeasurement() {
    const res = this.currentLab.calcPhysics(this.currentParams);
    const trialNum = this.currentTrials.length + 1;

    let p1, p2, p3, p4, err;
    if (this.currentLab.id === "lab01") {
      p1 = this.currentParams.volume_uL;
      p2 = res.v_mL;
      p3 = res.theoretical_mass;
      p4 = res.measured_mass;
      err = res.errPct + " %";
    } else if (this.currentLab.id === "lab04") {
      p1 = this.currentParams.rpm;
      p2 = this.currentParams.rotor_radius_cm;
      p3 = res.angular_vel;
      p4 = res.rcf_xg;
      err = this.currentParams.balancing_state === "balanced" ? "สมดุล 180°" : "ไม่สมดุล";
    } else if (this.currentLab.id === "lab12") {
      p1 = this.currentParams.sample_tube;
      p2 = res.transmittance;
      p3 = res.measured_od;
      p4 = res.linear_range;
      err = res.unknown_calc;
    } else {
      const vals = Object.values(res);
      p1 = this.currentParams[Object.keys(this.currentParams)[0]] || "-";
      p2 = vals[0] || "-";
      p3 = vals[1] || "-";
      p4 = vals[2] || "-";
      err = vals[3] || "0.00";
    }

    this.currentTrials.push({ trial: trialNum, p1, p2, p3, p4, err });
    this.renderDataTable();

    // Show Toast Notification
    this.showToast(`บันทึกค่า Trial #${trialNum} จากเครื่องมือ 3D สำเร็จ!`);
  }

  renderQuiz() {
    const quizContainer = document.getElementById("quizContainer");
    if (!quizContainer) return;

    quizContainer.innerHTML = "";
    this.currentLab.quiz.forEach((qItem, qIdx) => {
      const card = document.createElement("div");
      card.className = "bg-slate-900/60 border border-slate-800 rounded-xl p-3.5 space-y-2";
      card.innerHTML = `
        <div class="text-xs font-semibold text-slate-200">ข้อที่ ${qIdx + 1}. ${qItem.q}</div>
        <div class="space-y-1.5 mt-2">
          ${qItem.opts.map((opt, optIdx) => `
            <label class="flex items-start gap-2.5 p-2 rounded-lg bg-slate-950/60 hover:bg-slate-800/60 border border-slate-800 cursor-pointer text-xs text-slate-300">
              <input type="radio" name="quiz_${qIdx}" value="${optIdx}" class="mt-0.5 accent-emerald-500">
              <span>${opt}</span>
            </label>
          `).join("")}
        </div>
      `;
      quizContainer.appendChild(card);
    });
  }

  async submitReport() {
    if (!this.activeStudent) {
      alert("กรุณาลงทะเบียนหรือเข้าสู่ระบบด้วยรหัสนักศึกษาก่อนส่งรายงาน");
      this.openAuthModal();
      return;
    }

    // 1. Grade Quiz
    let quizScore = 0;
    const quizAnswers = {};
    this.currentLab.quiz.forEach((qItem, idx) => {
      const checked = document.querySelector(`input[name="quiz_${idx}"]:checked`);
      if (checked) {
        const val = parseInt(checked.value, 10);
        quizAnswers[`q${idx + 1}`] = val;
        if (val === qItem.ans) quizScore++;
      }
    });

    // 2. Conclusion & Discussion Text
    const conclusion = document.getElementById("reportConclusion")?.value.trim() || "ผลการทดลองสอดคล้องตามหลักการฟิสิกส์";
    const discussion = document.getElementById("reportDiscussion")?.value.trim() || "การทดลองมีความแม่นยำสูง";

    // 3. Compute Accuracy Score
    let avgErr = 0;
    if (this.currentTrials.length > 0) {
      const sumErr = this.currentTrials.reduce((acc, t) => acc + (parseFloat(t.err) || 0), 0);
      avgErr = sumErr / this.currentTrials.length;
    }
    const accuracyScore = Math.max(70.0, Math.min(100.0, 100.0 - (avgErr * 2)));

    const reportPayload = {
      student_id: this.activeStudent.student_id,
      lab_id: this.currentLab.id,
      table_data: this.currentTrials,
      error_percentage: avgErr,
      r_squared: 0.9995,
      post_quiz_score: quizScore,
      post_quiz_total: this.currentLab.quiz.length,
      quiz_answers: quizAnswers,
      conclusion,
      discussion,
      accuracy_score: accuracyScore
    };

    const result = await this.db.submitLabReport(reportPayload);
    if (result.success) {
      this.showReceiptModal(result.report_code, quizScore, accuracyScore);
    } else {
      alert("เกิดข้อผิดพลาดในการส่งรายงาน: " + (result.error || "Unknown"));
    }
  }

  showReceiptModal(code, quizScore, accuracy) {
    const modal = document.getElementById("receiptModal");
    if (!modal) return;

    document.getElementById("receiptReportCode").textContent = code;
    document.getElementById("receiptStudentName").textContent = `${this.activeStudent.fullname} (${this.activeStudent.student_id})`;
    document.getElementById("receiptLabTitle").textContent = `${this.currentLab.badge}: ${this.currentLab.titleTh}`;
    document.getElementById("receiptQuizScore").textContent = `${quizScore} / ${this.currentLab.quiz.length} คะแนน`;
    document.getElementById("receiptAccuracy").textContent = `${accuracy.toFixed(1)} %`;
    document.getElementById("receiptTimestamp").textContent = new Date().toLocaleString("th-TH");

    modal.classList.remove("hidden");
  }

  async openAnalyticsModal() {
    if (!this.activeStudent) {
      alert("กรุณาลงทะเบียนหรือเข้าสู่ระบบก่อนดูรายงานวิเคราะห์ผลรายบุคคล");
      this.openAuthModal();
      return;
    }

    const modal = document.getElementById("analyticsModal");
    if (!modal) return;

    const data = await this.db.getStudentProfile(this.activeStudent.student_id);
    const reports = data.reports || [];

    document.getElementById("anaStudentName").textContent = this.activeStudent.fullname;
    document.getElementById("anaStudentId").textContent = this.activeStudent.student_id;
    document.getElementById("anaCompletedCount").textContent = `${reports.length} / 13 Labs`;
    document.getElementById("anaProgressBar").style.width = `${(reports.length / 13) * 100}%`;

    // Render Submitted Reports List
    const listEl = document.getElementById("anaReportsList");
    if (listEl) {
      listEl.innerHTML = reports.length === 0
        ? `<div class="text-slate-400 text-xs text-center py-4">ยังไม่มีรายงานปฏิบัติการที่ส่ง</div>`
        : reports.map(r => `
          <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-3 flex items-center justify-between">
            <div>
              <div class="text-xs font-bold text-emerald-400">${r.report_code}</div>
              <div class="text-[11px] text-slate-300">${r.lab_id.toUpperCase()} • ส่งเมื่อ ${r.submitted_at}</div>
              ${r.instructor_feedback ? `<div class="text-[10px] text-amber-300 mt-1 font-sans">💬 อาจารย์: ${r.instructor_feedback}</div>` : ''}
            </div>
            <div class="text-right">
              <div class="text-xs font-mono font-bold text-sky-400">ความแม่นยำ: ${(r.accuracy_score || 95).toFixed(1)}%</div>
              <div class="text-[10px] text-slate-400">ควิซ: ${r.post_quiz_score}/${r.post_quiz_total}</div>
              ${r.instructor_score ? `<div class="text-[11px] font-bold text-emerald-300">คะแนน: ${r.instructor_score}/10</div>` : '<span class="text-[10px] text-slate-500">รอตรวจ</span>'}
            </div>
          </div>
        `).join("");
    }

    // Render Canvas Competency Radar Chart
    this.renderCompetencyRadar(reports);

    modal.classList.remove("hidden");
  }

  renderCompetencyRadar(reports) {
    const canvas = document.getElementById("radarCanvas");
    if (!canvas) return;
    const ctx = canvas.getContext("2d");
    const w = canvas.width;
    const h = canvas.height;
    const cx = w / 2;
    const cy = h / 2;
    const rMax = Math.min(cx, cy) - 35;

    ctx.clearRect(0, 0, w, h);

    const categories = [
      { name: "การวัด/ปิเปต", score: reports.some(r => r.lab_id === "lab01") ? 0.95 : 0.3 },
      { name: "กลศาสตร์/Centrifuge", score: reports.some(r => r.lab_id === "lab04") ? 0.98 : 0.3 },
      { name: "อุณหพลศาสตร์/Autoclave", score: reports.some(r => r.lab_id === "lab06") ? 0.90 : 0.2 },
      { name: "ไฟฟ้า/Electrophoresis", score: reports.some(r => r.lab_id === "lab08") ? 0.88 : 0.25 },
      { name: "ทัศนศาสตร์/กล้องจุลทรรศน์", score: reports.some(r => r.lab_id === "lab10") ? 0.92 : 0.3 },
      { name: "สเปกโตร/UV-C", score: reports.some(r => r.lab_id === "lab12") ? 0.96 : 0.35 }
    ];

    const n = categories.length;

    // Draw Background Polygon Web
    for (let level = 1; level <= 4; level++) {
      const radius = (rMax / 4) * level;
      ctx.beginPath();
      for (let i = 0; i < n; i++) {
        const angle = (i * 2 * Math.PI) / n - Math.PI / 2;
        const x = cx + Math.cos(angle) * radius;
        const y = cy + Math.sin(angle) * radius;
        if (i === 0) ctx.moveTo(x, y);
        else ctx.lineTo(x, y);
      }
      ctx.closePath();
      ctx.strokeStyle = "rgba(148, 163, 184, 0.18)";
      ctx.lineWidth = 1;
      ctx.stroke();
    }

    // Draw Axis lines & Labels
    ctx.font = "10px Sarabun, sans-serif";
    ctx.fillStyle = "#94a3b8";
    ctx.textAlign = "center";
    for (let i = 0; i < n; i++) {
      const angle = (i * 2 * Math.PI) / n - Math.PI / 2;
      const x = cx + Math.cos(angle) * rMax;
      const y = cy + Math.sin(angle) * rMax;
      ctx.beginPath();
      ctx.moveTo(cx, cy);
      ctx.lineTo(x, y);
      ctx.strokeStyle = "rgba(148, 163, 184, 0.25)";
      ctx.stroke();

      const labelX = cx + Math.cos(angle) * (rMax + 20);
      const labelY = cy + Math.sin(angle) * (rMax + 20) + 3;
      ctx.fillText(categories[i].name, labelX, labelY);
    }

    // Draw Student Polygon
    ctx.beginPath();
    for (let i = 0; i < n; i++) {
      const angle = (i * 2 * Math.PI) / n - Math.PI / 2;
      const radius = rMax * categories[i].score;
      const x = cx + Math.cos(angle) * radius;
      const y = cy + Math.sin(angle) * radius;
      if (i === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.fillStyle = "rgba(16, 185, 129, 0.35)";
    ctx.fill();
    ctx.strokeStyle = "#10b981";
    ctx.lineWidth = 2;
    ctx.stroke();
  }

  async openAdminModal() {
    const modal = document.getElementById("adminModal");
    if (!modal) return;

    const data = await this.db.adminGetOverview();
    const students = data.students || [];
    const reports = data.reports || [];

    document.getElementById("admTotalStudents").textContent = students.length;
    document.getElementById("admTotalReports").textContent = reports.length;

    // Render Reports Table
    const tbody = document.getElementById("admReportsTableBody");
    if (tbody) {
      tbody.innerHTML = reports.map(r => `
        <tr class="hover:bg-slate-800/40 border-b border-slate-800/60 text-xs">
          <td class="px-3 py-2 font-mono text-emerald-400 font-bold">${r.report_code}</td>
          <td class="px-3 py-2 text-slate-200">${r.fullname || r.student_id} (${r.student_id})</td>
          <td class="px-3 py-2 uppercase font-bold text-sky-400">${r.lab_id}</td>
          <td class="px-3 py-2 font-mono">${(r.accuracy_score || 95).toFixed(1)}%</td>
          <td class="px-3 py-2 font-mono">${r.post_quiz_score}/${r.post_quiz_total}</td>
          <td class="px-3 py-2 text-slate-400">${r.submitted_at}</td>
          <td class="px-3 py-2">
            <button onclick="app.gradeReportPrompt('${r.report_code}', '${r.instructor_score || ''}')" class="px-2 py-1 rounded bg-slate-800 hover:bg-emerald-600 border border-slate-700 hover:border-emerald-500 text-slate-200 text-[10px] font-bold">
              ${r.instructor_score ? `ตรวจแล้ว (${r.instructor_score})` : 'ตรวจให้คะแนน'}
            </button>
          </td>
        </tr>
      `).join("");
    }

    modal.classList.remove("hidden");
  }

  async gradeReportPrompt(code, currentScore) {
    const scoreStr = prompt(`ระบุคะแนนเต็ม 10 สำหรับรหัสรายงาน ${code}:`, currentScore || "10");
    if (scoreStr === null) return;
    const score = parseFloat(scoreStr);
    const feedback = prompt("ระบุข้อเสนอแนะแก่นักศึกษา:", "ผลการทดลองเรียบร้อย ถูกต้องตามหลักการทางฟิสิกส์");
    if (feedback === null) return;

    const res = await this.db.instructorGrade(code, score, feedback);
    if (res.success) {
      alert("บันทึกคะแนนเรียบร้อยแล้ว");
      this.openAdminModal();
    }
  }

  openAuthModal() {
    document.getElementById("authModal")?.classList.remove("hidden");
  }

  closeModal(id) {
    document.getElementById(id)?.classList.add("hidden");
  }

  logout() {
    if (confirm("คุณต้องการออกจากระบบหรือไม่?")) {
      this.db.logoutStudent();
      this.activeStudent = null;
      this.updateUserBadge();
      this.showToast("ออกจากระบบเรียบร้อยแล้ว");
    }
  }

  showToast(msg) {
    const toast = document.createElement("div");
    toast.className = "fixed bottom-6 right-6 z-50 bg-emerald-600 text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-2xl flex items-center gap-2 transform transition-all duration-300";
    toast.innerHTML = `<i class="fa-solid fa-circle-check"></i> <span>${msg}</span>`;
    document.body.appendChild(toast);
    setTimeout(() => {
      toast.style.opacity = "0";
      setTimeout(() => toast.remove(), 300);
    }, 2500);
  }

  bindEvents() {
    // Mode Switchers
    document.getElementById("btnMode3D")?.addEventListener("click", () => this.sim.setMode("3d"));
    document.getElementById("btnModeAR")?.addEventListener("click", () => this.sim.setMode("ar"));
    document.getElementById("btnModeHand")?.addEventListener("click", () => this.sim.setMode("hand"));

    // Reset Camera
    document.getElementById("btnResetCamera")?.addEventListener("click", () => {
      this.sim.camera.position.set(0, 5.5, 9.5);
      if (this.sim.controls) this.sim.controls.target.set(0, 1.5, 0);
    });

    // Capture 3D Data
    document.getElementById("btnCaptureData")?.addEventListener("click", () => this.capture3DMeasurement());

    // Submit Lab Report
    document.getElementById("btnSubmitReport")?.addEventListener("click", () => this.submitReport());

    // Open Student Analytics Portfolio
    document.getElementById("btnOpenAnalytics")?.addEventListener("click", () => this.openAnalyticsModal());

    // Open Admin CMS
    document.getElementById("btnOpenAdmin")?.addEventListener("click", () => this.openAdminModal());

    // Auth Form Submit
    document.getElementById("authForm")?.addEventListener("submit", async (e) => {
      e.preventDefault();
      const studentId = document.getElementById("inpStudentId").value.trim();
      const prefix = document.getElementById("inpPrefix").value;
      const fullname = document.getElementById("inpFullname").value.trim();
      const section = document.getElementById("inpSection").value;
      const email = document.getElementById("inpEmail").value.trim();
      const phone = document.getElementById("inpPhone").value.trim();

      const res = await this.db.registerStudent({
        student_id: studentId,
        prefix,
        fullname,
        section,
        email,
        phone,
        program: "จุลชีววิทยา"
      });

      if (res.success) {
        this.activeStudent = res.student;
        this.updateUserBadge();
        this.closeModal("authModal");
        this.showToast(`ยินดีต้อนรับ ${fullname} เข้าสู่ห้องปฏิบัติการเสมือนจริง`);
      }
    });
  }
}

// Global App Instance
let app = null;
window.addEventListener("DOMContentLoaded", () => {
  app = new AppController();
});
