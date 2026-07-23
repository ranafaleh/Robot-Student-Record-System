<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include "rrana.php";

if (!isset($_POST["id"])) {
    die("ID not received");
}

$id = (int) $_POST["id"];

echo "Received ID: " . $id;

$update = $conn->query("
    UPDATE robot
    SET status = IF(status = 0, 1, 0)
    WHERE id = $id
");

if (!$update) {
    die("Update error: " . $conn->error);
}

$result = $conn->query("SELECT * FROM robot");

if (!$result) {
    die("Select error: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {

    echo "<tr>";

    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
    echo "<td>" . $row["age"] . "</td>";
    echo "<td>" . $row["status"] . "</td>";

    echo "<td>
            <button type='button'
                    onclick='toggleStatus(" . $row["id"] . ")'>
                Toggle
            </button>
          </td>";

    echo "</tr>";
}

$conn->close();

?>