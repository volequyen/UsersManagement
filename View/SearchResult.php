<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
</head>
<body>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: ../View/Login.html");
        exit();
    }
    $user = $_SESSION['user'];
    echo "Welcome, " . $user;
    if (isset($result) && !empty($result)) {
        echo '<table border="1" width="20%">';
        echo '<caption>Kết quả tìm kiếm</caption>';
        echo '<tr><th>Firstname</th><th>Lastname</th><th>Role</th><th>Delete</th></tr>';
    
        foreach ($result as $rs) {
            echo '<tr>';
            echo '<td>' . $rs->firstname . '</td>';
            echo '<td>' . $rs->lastname . '</td>';
            echo '<td>' . $rs->role . '</td>';
            echo '<td><a href="Controller.php?username='.$rs->username.'">Detail</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No Result is matched!</p>';
    }
?>

</body>
</html>