<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Is_A_Part_of");
$parts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>partof</title>
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
    <h1>Is A Part Of</h1>

    <?php if ($parts): ?>
    <table>
        <thead>
            <tr>
                <th>BrandID</th>
                <th>ItemID</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($parts as $part): ?>
            <tr>
                <td><?= number_format($part['brandID'])?></td>
                <td><?= number_format($part['itemID'])?></td>


            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
