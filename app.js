const express = require('express');
const path = require('path');
const mysql = require('mysql');

const app = express();
const port = 3000;

// เชื่อมต่อกับ MySQL
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'leaveday'
});

db.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL: ' + err.stack);
        return;
    }
    console.log('Connected to MySQL');
});

// Middleware เพื่อให้ Express อ่านข้อมูลจากฟอร์ม HTML
app.use(express.urlencoded({ extended: true }));

// เส้นทางสำหรับการแสดงฟอร์ม HTML
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'leaveday.html'));
});

// สร้าง API Endpoint สำหรับบันทึกรายการ
app.post('/saveTransaction', (req, res) => {
    // ดึงข้อมูลจากฟอร์ม HTML
    const { title, firstName, lastName, birthDate, updatedAt } = req.body;

    // ส่วนนี้จะให้บันทึกรายการลงในฐานข้อมูล MySQL
    // โดยใช้คำสั่ง SQL และการใช้ db.query

    res.send('Transaction saved successfully');
});

// กำหนดให้ Express รันที่ Port 3000
app.listen(port, () => {
    console.log('Server is running on port ' + port);
});