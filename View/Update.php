<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật</title>
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
    ?>
    <form action="../Controller/Controller.php" method="post">
        <label for="username">Lastname: </label>
        <input type="text" name="lastname" value="<?php echo $result['lastname']; ?>">
        <label for="role">Role: </label>
        <input type="text" name="role" value="<?php echo $result['role']; ?>">
        <input type="hidden" name="username" value="<?php echo $result['username']; ?>">
        <button type="submit" name="update" id="update">Update</button>
    </form>
    <a href="Logout.php">Log out</a>
</body>
</html>