<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa user</title>
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
        echo "Welcome, ". $user;
    ?>
    <form action="../Controller/Controller.php" method="post" >
        <?php
            echo '<table border="1" width="20%">';
            echo '<caption>Thông tin</caption>';
            echo '<tr><th>Firstname</th><th>Lastname</th><th>Role</th></tr>';
            echo '<tr>';
            echo '<td>' . $result['firstname'] . '</td>';
            echo '<td>' . $result['lastname'] . '</td>';
            echo '<td>' . $result['role'] . '</td>';
            echo '</tr>';
            echo '</table>';
            echo '<input type="hidden" name="username" value="' . $result['username'] . '">';
            echo ' <button type="submit" name="delete">Delete</button>';
            echo ' <button type ="submit" name="updateform">Update</button>';
        ?>
    </form>

</body>
</html>
