<?php 
include "connessione.php";
?>

<?php


$anno = $_GET["anno"];
$includiDateSconosciute = isset($_GET["includiDateSconosciute"]);

$query = "SELECT * FROM sale WHERE YEAR(DataApertura) = '$anno'";

echo "<p> Hai scelto l'anno: " . $anno . "</p>";

if($includiDateSconosciute){
    $query = $query . " OR DataApertura IS NULL";
    echo "<p>Hai scelto di includere pure le date sconosciute</p><br>";
}


$result = $conn->query($query);


if ($result->num_rows > 0) { 
    echo "<table style = 'border: 1px solid black; text-align: center; margin: auto; width: 50%; font-size: 30px'>";

    $firstRow = $result->fetch_assoc();
    echo "<tr>";

    foreach(array_keys($firstRow) as $key){
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";
    
        echo "<tr>";
        foreach($firstRow as $value){
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach($row as $value){ 
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

} 


?>