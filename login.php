<?php
session_start();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "12345")
    {
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Admin Login</h2>

<?php
if(isset($error))
{
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

<label>Username</label>
<input type="text" name="username" required>

<br><br>

<label>Password</label>
<input type="password" name="password" required>

<br><br>

<button type="submit" name="login">
Login
</button>

</form>

</div>

</body>
</html>