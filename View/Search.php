<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
    
        .welcome{
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        
    </style>
</head>
<body>
    <div class="welcome">
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
    ?>
    </div>

    <form method="POST" action="../Controller/Controller.php">
        <label>Tìm kiếm</label>
        <input type="text" name="search_value" required placeholder="Nhập từ khóa tìm kiếm">
        <input type="submit" name="search" value="OK">
        <input type="reset" value="Reset">
    </form>
    <a href="../Controller/Controller.php?logout=true";">
        Log out
    </a>


</body>
</html>