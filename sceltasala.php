<?php 
include "connessione.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center;">

<?php

$query = "SELECT * FROM sale";
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
            if($value == null){
                $value = "Data Sconosciuta";
            }
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

}

?>

<form action="scriptsale.php" method="get">

<br>
<label>Scegli l'anno di apertura</label> 
<input type="text" name="anno">
<br><br>

<input type="checkbox" name="includiDateSconosciute"> Includi sale con data di apertura sconosciuta
<br><br>


<input type="submit" value="Invia">


</form>

    
</body>
</html> 