<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Base Control</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 50px;
        }
        button {
            padding: 15px 30px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Control Robot Base</h1>
    <form action="control_robot.php" method="post">
        <button name="direction" value="forward">Forward</button><br>
        <button name="direction" value="left">Left</button>
        <button name="direction" value="stop">Stop</button>
        <button name="direction" value="right">Right</button><br>
        <button name="direction" value="backward">Backward</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // استلام الاتجاه
        $direction = $_POST['direction'];

        // اتصال بقاعدة البيانات
        $conn = new mysqli('localhost', 'root', '', 'project'); // تعديل هنا
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // تخزين الاتجاه في قاعدة البيانات
        $sql = "INSERT INTO directions_4 (direction) VALUES ('$direction')"; // تأكد أن اسم الجدول هو directions
        if ($conn->query($sql) === TRUE) {
            echo "<p>Direction saved: $direction</p>";
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
