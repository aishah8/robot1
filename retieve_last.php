<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli('localhost', 'root', '', 'project');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب آخر قيمة من الجدول
$sql = "SELECT direction FROM directions_4 ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Last direction: " . $row['direction'];
} else {
    echo "No data found.";
}

$conn->close();
?>