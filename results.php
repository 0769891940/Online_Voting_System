<?php

include("db.php");

$result = mysqli_query(
    $conn,
    "SELECT * FROM candidates"
);
$winner = mysqli_query(
    $conn,
    "SELECT * FROM candidates
     ORDER BY votes DESC
     LIMIT 1"
);

$winnerData = mysqli_fetch_assoc($winner);
$totalVotesQuery = mysqli_query(
    $conn,
    "SELECT SUM(votes) AS total_votes
     FROM candidates"
);

$totalVotesData = mysqli_fetch_assoc($totalVotesQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voting Results</title>
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
<h2>Voting Results</h2>

<h3>
Total Votes:
<?php echo $totalVotesData['total_votes']; ?>
</h3>

<h3>
Winner:
<?php echo $winnerData['name']; ?>
(<?php echo $winnerData['votes']; ?> Votes)
</h3>
<table border="1" cellpadding="10">

<tr>
    <th>Candidate</th>
    <th>Votes</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['votes']; ?></td>
</tr>

<?php
}
?>

</table>

<br><br>

<a href="index.php">Back to Voting Page</a>
<footer>
    <p>Online Voting System</p>
    <p>Developed by Salma Kihamaya Juma</p>
    <p>&copy; 2026</p>
</footer>
</div>
</body>
</html>