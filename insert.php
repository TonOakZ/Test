<?php
// กำหนดข้อมูลการเชื่อมต่อ MySQL
$servername = "localhost"; // เชื่อมต่อกับ MySQL ที่อยู่ในเครื่องเดียวกัน
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = ""; // รหัสผ่าน MySQL
$dbname = "leaveday"; // ชื่อฐานข้อมูลที่ต้องการเข้าถึง

// สร้างการเชื่อมต่อ MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์มหรือที่มาอื่น ๆ
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
// เพิ่มฟิลด์และค่าข้อมูลตามที่ต้องการ

// สร้างคำสั่ง SQL สำหรับการแทรกข้อมูล
$sql = "INSERT INTO mytable (id, firstname, lastname) VALUES ('$id', '$firstname', '$lastname')";
// ปรับเปลี่ยน mytable เป็นชื่อของตารางในฐานข้อมูลของคุณ และเพิ่มฟิลด์และค่าข้อมูลตามที่คุณต้องการบันทึก

// ทำการแทรกข้อมูลลงในฐานข้อมูล
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ MySQL
$conn->close();
?>
