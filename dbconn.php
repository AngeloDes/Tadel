<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tadel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//$sql = "SELECT id, name, bauart, kraftstoff, farbe FROM privat";
/*$sql = "SELECT * FROM privat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br><br>id: " . $row["id"].
        "<br> - Name: " . $row["name"].
        "<br> - Kraftstoff: " . $row["kraftstoff"].
        "<br> - Bauart: " . $row["bauart"].
        "<br> - Farbe: " . $row["farbe"]. "<br><hr>";
    }
} else {
    echo "0 results";
}*/
//$conn->close();

?>
