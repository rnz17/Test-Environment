<?php
// PHP code to connect to the database
$servername = "localhost";
$username = "root";
$password = "051703";
$dbname = "zealia";

$conn = new mysqli($servername, $username, $password, $dbname);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to select all rows and columns from the accounts table
    $stmt = $conn->prepare("SELECT * FROM accounts");
    $stmt->execute();

    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
        // Add more columns as needed
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Grouping Script</title>
</head>
<body>
    <button id="myButton" onclick="myFunc()">Run Grouping Script</button>

    <script src="grouping.js"></script>

</body>
</html>
