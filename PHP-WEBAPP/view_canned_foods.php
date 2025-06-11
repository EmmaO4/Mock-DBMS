<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM CannedFood");
$canned_foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Canned Food List</title>
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
    <h1>Cannded Food Information</h1>

    <?php if ($canned_foods): ?>
    <table>
        <thead>
            <tr>
                <th>itemID</th>
		<th>Food Type</th>
		<th>Liquid Type</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($canned_foods as $food): ?>
            <tr>
                <td><?= number_format($food['itemID'])?></td>                 
                <td><?= htmlspecialchars($food['food_type']) ?></td>               
                <td><?= htmlspecialchars($food['liquid_type']) ?></td>     
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No canned foods </p>
    <?php endif; ?>

</body>
</html>
