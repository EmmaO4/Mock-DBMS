<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Department_holds");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Department Holds</title>
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
    <h1>Department Holds</h1>

    <?php if ($items): ?>
    <table>
        <thead>
            <tr>
                <th>DepartmentID</th>
                <th>ItemID</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= number_format($item['DepartmentID'])?></td>
                <td><?= number_format($item['itemID'])?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
