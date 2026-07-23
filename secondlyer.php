<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "rrana.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Robot Website</title>

    <link rel="stylesheet" href="./ robotstyle.css">
</head>

<body>

<h2>Robot Form</h2>

<form id="myForm">

    <input
        type="text"
        id="name"
        placeholder="Name"
        required
    >

    <input
        type="number"
        id="age"
        placeholder="Age"
        required
    >

    <button type="submit">Submit</button>

</form>

<br>

<table border="1">

    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Status</th>
            <th>Toggle</th>
        </tr>
    </thead>

    <tbody id="tableBody">

    <?php

    $result = $conn->query("SELECT * FROM robot");

    if ($result) {

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . htmlspecialchars($row['name']) . "</td>";

            echo "<td>" . $row['age'] . "</td>";

            echo "<td>" . $row['status'] . "</td>";

            echo "<td>
                    <button onclick='toggleStatus(" . $row['id'] . ")'>
                        Toggle
                    </button>
                  </td>";

            echo "</tr>";
        }

    } else {

        echo "<tr>";
        echo "<td colspan='4'>Error: " . $conn->error . "</td>";
        echo "</tr>";
    }

    ?>

    </tbody>

</table>

<script src="robotscript.js"></script>

</body>

</html>