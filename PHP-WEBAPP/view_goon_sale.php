<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Go_On_Sale");
$goons = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Go On Sale</title>
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
    <h1>Go On Sale</h1>

    <?php if ($goons): ?>
    <table>
        <thead>
            <tr>
                <th>SaleID</th>
                <th>ItemID</th>
                <th>Discount Percent</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($goons as $goon): ?>
            <tr>
                <td><?= number_format($goon['saleID'])?></td>
                <td><?= number_format($goon['itemID'])?></td>
                <td><?= number_format($goon['discount_percentage'], decimals: 2)?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
