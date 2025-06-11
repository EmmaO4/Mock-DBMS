<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Is_A_Component");
$components = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>components</title>
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
    <h1>Components</h1>

    <?php if ($components): ?>
    <table>
        <thead>
            <tr>
                <th>RecipeID</th>
                <th>ItemID</th>
                <th>Amount</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($components as $component): ?>
            <tr>
                <td><?= number_format($component['RecipeID'])?></td>
                <td><?= number_format($component['ItemID'])?></td>
                <td><?= number_format($component['How_much'])?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
