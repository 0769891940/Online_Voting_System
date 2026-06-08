<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

include("db.php");

$result = mysqli_query($conn, "SELECT * FROM candidates");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Admin Dashboard</h2>

<p>Welcome Admin</p>

<table border="1" width="300%">
<tr>
    <th>Candidate</th>
    <th>Votes</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['votes']."</td>";
    echo "</tr>";
}
?>

</table>

<br>

<a href="logout.php">
    <button>Logout</button>
</a>

</div>

</body>
</html>