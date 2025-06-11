<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM HotFood");
$hotfoods = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>HotFoods</title>
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
    <h1>Hot Food</h1>

    <?php if ($hotfoods): ?>
    <table>
        <thead>
            <tr>
                <th>itemID</th>
                <th>Temperature</th>
                <th>Freshness Timer</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotfoods as $hotfood): ?>
            <tr>
                <td><?= number_format($hotfood['itemID'])?></td>
                <td><?= number_format($hotfood['temperature'])?></td>
                <td><?= number_format($hotfood['freshness_time'])?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No Hot Food</p>
    <?php endif; ?>

</body>
</html>
