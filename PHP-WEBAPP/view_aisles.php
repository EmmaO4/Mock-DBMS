<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Aisle_Is_Aisle_In");
$aisle_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Aisle List</title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          padding: 6px;
        }
        th {
          background-color: #ddd;
        }
    </style>
</head>
<body>
    <a href="index.html">
        <button style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
            Back to Home
        </button>
    </a>
    <h1>Aisle Information</h1>

    <?php if ($aisle_info): ?>
    <table>
        <thead>
            <tr>
                <th>departmentID</th>
                <th>Aisle Number</th>
                <th>Name</th>
                <th>Locked Shelfs</th>
                <th>Number of Shelves</th>
                <th>Length</th>
                <th>Width</th>
                <th>Locked Shelves</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aisle_info as $data): ?>
            <tr>
                <td><?= number_format($data['departmentID'])?></td>
                <td><?= number_format($data['aisle_number'])?></td>
                <td><?= htmlspecialchars($data['name']) ?></td>
                <td><?= $data['Locked_shelves'] ? 'Yes' : 'No' ?></td>
                <td><?= number_format($data['number_of_Shelves'])?></td>
                <td><?= number_format($data['Length'], 2) ?></td>
                <td><?= number_format($data['Width'], 2) ?></td>
                <td><?= $data['Locked_shelves'] ? 'Yes' : 'No' ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No datas </p>
    <?php endif; ?>

</body>
</html>
