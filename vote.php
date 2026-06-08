<?php

session_start();

if(isset($_SESSION['voted']))
{
    echo "
    <h2>You have already voted!</h2>
    <a href='results.php'>View Results</a>
    ";
    exit();
}

include("db.php");

$id = $_POST['candidate'];

mysqli_query(
    $conn,
    "UPDATE candidates
     SET votes = votes + 1
     WHERE id = $id"
);

$_SESSION['voted'] = true;

echo "
<h2>Vote Submitted Successfully</h2>

<a href='results.php'>
View Results
</a>
";

?>