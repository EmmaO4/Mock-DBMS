<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Deli");
$deli_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Deli List</title>
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
    <h1>Deli Information</h1>

    <?php if ($deli_info): ?>
    <table>
        <thead>
            <tr>
                <th>itemID</th>  
                <th>Cut Type</th>
                <th>Cook Time</th>                                               

            </tr>
        </thead>
        <tbody>
            <?php foreach ($deli_info as $item): ?>
            <tr>
                <td><?= number_format($item['itemID'])?></td> 
                <td><?= htmlspecialchars($item['cut_type']) ?></td>
                <td><?= number_format($item['cook_time'])?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No deli items </p>
    <?php endif; ?>

</body>
</html>
