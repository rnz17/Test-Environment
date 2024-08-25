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

    $rows = [];
    // SQL query to select all rows and columns from the accounts table
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE account_type = 'student'");
    $stmt->execute();

    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $row) {

        $cont = [$row["school_id"], $row["result"], $row["l_name"]];
        $rows[] = $cont;
        
    }

    // foreach ($rows as $row){
    //     echo "$row[0] $row[1] $row[2]<br>";
        
    // }

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

    <script type="text/javascript">
        var rows = <?php echo json_encode($rows); ?>;
    </script>
    <script src="grouping.js"></script>

</body>
</html>
