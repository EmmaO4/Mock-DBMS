<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Sale");
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Stores List</title>
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
    <h1>All Sales</h1>

    <?php if ($sales): ?>
    <table>
        <thead>
            <tr>
                <th>saleID</th>
                <th>Promo Code</th>
                <th>Coupon Type</th>
                <th>Season</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale): ?>
            <tr>
                <td><?= number_format($sale['saleID'])?></td>
                <td><?= htmlspecialchars($sale['promo_code'])?></td>
                <td><?= htmlspecialchars($sale['coupon_type'])?></td>
                <td><?= htmlspecialchars($sale['season'])?></td>
                <td><?= htmlspecialchars($sale['name'])?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No stores </p>
    <?php endif; ?>

</body>
</html>
