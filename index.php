<?php
include("db.php");

$result = mysqli_query($conn, "SELECT * FROM candidates");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Voting System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <nav>
    
    <a href="index.php">Vote</a> |
    <a href="results.php">Results</a> |
    <a href="about.php">About</a>
    <a href="login.php">Admin</a>
    <a href="logout.php">Logout</a>
</nav>
<hr>
    <h2>Online Voting System</h2>

<form action="vote.php" method="POST">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<input type="radio"
name="candidate"
value="<?php echo $row['id']; ?>"
required>

<?php echo $row['name']; ?>

<br><br>

<?php
}
?>

<button type="submit">Vote</button>

</form>
<footer>
    <p>Online Voting System</p>
    <p>Developed by Salma Kihamaya Juma</p>
    <p>&copy; 2026</p>
</footer>
</div>
</body>
</html>
