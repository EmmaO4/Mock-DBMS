<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Dairy");
$dairy = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dairy Item List</title>
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
    <h1>Dairy Item Information</h1>

    <?php if ($dairy): ?>
    <table>
        <thead>
            <tr>
                <th>itemID</th>
                <th>Liquid/Solid</th>
                <th>Source Type</th>                                                  

            </tr>
        </thead>
        <tbody>
            <?php foreach ($dairy as $item): ?>
            <tr>
                <td><?= number_format($item['itemID'])?></td>                 
                <td><?= htmlspecialchars($item['liquid_or_solid']) ?></td>               
                <td><?= htmlspecialchars($item['source_type']) ?></td>     
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No dairy items </p>
    <?php endif; ?>

</body>
</html>
