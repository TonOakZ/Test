<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leaveday";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// รับค่าจากแบบฟอร์ม
$fullname = $_POST['fullname'];
$affiliation = $_POST['affiliation'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$leave_type = $_POST['leave_type'];
$reason = $_POST['reason'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$timestamp = $_POST['timestamp'];
$status = $_POST['status'];

// สร้างคำสั่ง SQL INSERT
$sql = "INSERT INTO leave_requests (fullname, affiliation, email, phone, leave_type, reason, start_date, end_date, timestamp, status)
VALUES ('$fullname', '$affiliation', '$email', '$phone', '$leave_type', '$reason', '$start_date', '$end_date', '$timestamp', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
