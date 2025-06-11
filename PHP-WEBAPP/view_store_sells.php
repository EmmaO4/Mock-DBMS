<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Sells");
$sells = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Sells</title>
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
    <h1>Sells</h1>

    <?php if ($sells): ?>
    <table>
        <thead>
            <tr>
                <th>StoreID</th>
                <th>ItemID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sells as $sold): ?>
            <tr>
                <td><?= htmlspecialchars($sold['storeID'])?></td>
                <td><?= number_format($sold['itemID'])?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
