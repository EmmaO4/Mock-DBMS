<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Provides");
$provides = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Provides</title>
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
    <h1>Provides</h1>

    <?php if ($provides): ?>
    <table>
        <thead>
            <tr>
                <th>RecipeID</th>
                <th>StoreID</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($provides as $provided): ?>
            <tr>
                <td><?= number_format($provided['RecipeID'])?></td>
                <td><?= htmlspecialchars($provided['storeID'])?></td>


            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
