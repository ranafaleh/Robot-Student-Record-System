<?php

include "rrana.php";

$name = $_POST['name'];
$age = $_POST['age'];

$conn->query("INSERT INTO robot (name, age, status)
VALUES ('$name', '$age', 0)");

$result = $conn->query("SELECT * FROM robot");

while ($row = $result->fetch_assoc()) {

    echo "<tr>";

    echo "<td>" . $row['name'] . "</td>";

    echo "<td>" . $row['age'] . "</td>";

    echo "<td>" . $row['status'] . "</td>";

    echo "<td>
            <button onclick='toggleStatus(" . $row['id'] . ")'>
                Toggle
            </button>
          </td>";

    echo "</tr>";
}

?>