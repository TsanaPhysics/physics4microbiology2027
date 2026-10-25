/**
 * Google Apps Script for Virtual Physics for Microbiology Lab
 * คู่มือการเชื่อมโยง Google Sheet กับ Virtual Lab (SQLite + Google Sheets Integration)
 * 
 * วิธีการติดตั้ง:
 * 1. เปิด Google Sheets ใหม่ หรือชีตวิชาฟิสิกส์สำหรับจุลชีววิทยา
 * 2. ไปที่เมนู "ส่วนขยาย" (Extensions) > "Apps Script"
 * 3. คัดลอกโค้ดด้านล่างทั้งหมดไปวางแทนที่โค้ดเดิม
 * 4. กด "บันทึก" (Save)
 * 5. กดปุ่ม "ทำให้ใช้งานได้" (Deploy) > "การทำให้ใช้งานได้รายการใหม่" (New deployment)
 * 6. เลือกประเภท: "เว็บแอป" (Web app)
 * 7. ตั้งค่า:
 *    - ดำเนินการในฐานะ: "ฉัน" (Me)
 *    - ผู้ที่มีสิทธิ์เข้าถึง: "ทุกคน" (Anyone)
 * 8. กด "ทำให้ใช้งานได้" (Deploy) แล้วคัดลอก "URL เว็บแอป" (Web App URL)
 * 9. นำ URL มาใส่ในระบบ Virtual Lab หรือไฟล์ google_sheets_config.json
 */

function doPost(e) {
  var lock = LockService.getScriptLock();
  lock.tryLock(10000);
  
  try {
    var ss = SpreadsheetApp.getActiveSpreadsheet();
    var sheet = ss.getSheetByName("ผลการทดลอง Lab 01") || ss.getActiveSheet();
    
    // สร้างหัวตารางถ้ายังไม่มี
    if (sheet.getLastRow() === 0) {
      sheet.appendRow([
        "วัน-เวลาที่ส่ง",
        "รหัสรายงาน",
        "รหัสนักศึกษา",
        "ชื่อ - นามสกุล",
        "สาขาวิชา",
        "กลุ่มเรียน",
        "ปฏิบัติการ",
        "ข้อมูลตารางบันทึกผล (JSON)",
        "วิธีคำนวณ",
        "สรุปและวิเคราะห์ผล",
        "การอภิปรายผล",
        "คำถามท้ายการทดลอง",
        "ลิงก์ภาพถ่าย/แคปหน้าจอหลักฐาน"
      ]);
      sheet.getRange(1, 1, 1, 13).setFontWeight("bold").setBackground("#0f172a").setFontColor("#38bdf8");
    }
    
    var data = JSON.parse(e.postData.contents);
    
    var row = [
      data.timestamp || new Date().toISOString(),
      data.report_code || "",
      data.student_id || "",
      data.fullname || "",
      data.program || "",
      data.section || "",
      data.lab_id || "",
      JSON.stringify(data.table_data || {}),
      data.calculations || "",
      data.conclusion || "",
      data.discussion || "",
      JSON.stringify(data.quiz_answers || {}),
      data.image_proof_url || ""
    ];
    
    sheet.appendRow(row);
    
    return ContentService.createTextOutput(JSON.stringify({
      "status": "success",
      "message": "บันทึกข้อมูลลง Google Sheet สำเร็จเรียบร้อย",
      "row": sheet.getLastRow()
    })).setMimeType(ContentService.MimeType.JSON);
    
  } catch (error) {
    return ContentService.createTextOutput(JSON.stringify({
      "status": "error",
      "message": error.toString()
    })).setMimeType(ContentService.MimeType.JSON);
  } finally {
    lock.releaseLock();
  }
}

function doGet(e) {
  return ContentService.createTextOutput(JSON.stringify({
    "status": "online",
    "service": "Virtual Physics for Microbiology Google Sheet Sync API",
    "timestamp": new Date().toISOString()
  })).setMimeType(ContentService.MimeType.JSON);
}
