// สร้าง API Endpoint สำหรับบันทึกรายการ
app.post('/saveTransaction', (req, res) => {
    // ดึงข้อมูลจากฟอร์ม HTML
    const { id, firstName, lastName, position, email, phone, sickLeave, businessLeave, annualLeave, otherLeave, requestDate, untilDate, dateTimeOfRecording, waitingToConsider, approve, notApproved } = req.body;

    // สร้างคำสั่ง SQL สำหรับการบันทึกข้อมูลลงในฐานข้อมูล
    const sql = "INSERT INTO transactions (id, first_name, last_name, position, email, phone, sick_leave, business_leave, annual_leave, other_leave, request_date, until_date, date_time_of_data_recording, waiting_to_consider, approve, not_approved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Execute the SQL query
    db.query(sql, [id, firstName, lastName, position, email, phone, sickLeave, businessLeave, annualLeave, otherLeave, requestDate, untilDate, dateTimeOfRecording, waitingToConsider, approve, notApproved], (err, result) => {
        if (err) {
            console.error('Error executing SQL query: ' + err.stack);
            res.status(500).send('Error saving transaction');
            return;
        }
        console.log('Transaction saved successfully');
        res.send('Transaction saved successfully');
    });
});


