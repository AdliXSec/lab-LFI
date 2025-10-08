<?php
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = 'admin';
    $password = 'password';

    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        $_SESSION['loggedin'] = true;
        echo "<a href='vulnerable10.php?file=ZG9jcy9kb2t1bWVuLnR4dA=='>Klik untuk melihat dokumen</a>";
    } else {
        $error = 'Username atau password salah.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="login.php" method="post">
        Username: <input type="text" name="username" value="admin"><br>
        Password: <input type="password" name="password" value="password"><br>
        <input type="submit" value="Login">
    </form>
    <p style="color:red;"><?php echo $error; ?></p>
</body>
</html>