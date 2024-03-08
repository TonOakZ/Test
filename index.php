<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish MySQL connection
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "leaveday"; // Replace with your MySQL database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO leaves (id, firstname, lastname, position, email, phone, sick_leave, business_leave, annual_leave, other_leave, request_date_until_date, date_time_of_data_recording, waiting_to_consider, approve, not_approved, timestamp, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssssssssssssss", $id, $firstname, $lastname, $position, $email, $phone, $sick_leave, $business_leave, $annual_leave, $other_leave, $request_date_until_date, $date_time_of_data_recording, $waiting_to_consider, $approve, $not_approved, $timestamp, $status);

    // Get form data
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sick_leave = $_POST['sick_leave'];
    $business_leave = $_POST['business_leave'];
    $annual_leave = $_POST['annual_leave'];
    $other_leave = $_POST['other_leave'];
    $request_date_until_date = $_POST['request_date_until_date'];
    $date_time_of_data_recording = $_POST['date_time_of_data_recording'];
    $waiting_to_consider = $_POST['waiting_to_consider'];
    $approve = $_POST['approve'];
    $not_approved = $_POST['not_approved'];
    $timestamp = $_POST['timestamp'];
    $status = $_POST['status'];

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Leave request saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
