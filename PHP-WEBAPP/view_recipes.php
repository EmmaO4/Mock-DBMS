<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Recipe");
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Recipes</title>
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
    <h1>Recipes</h1>

    <?php if ($recipes): ?>
    <table>
        <thead>
            <tr>
                <th>RecipeID</th>
                <th>Serving Size</th>
                <th>Rating</th>
                <th>Number of Items</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipes as $recipe): ?>
            <tr>
                <td><?= number_format($recipe['RecipeID'])?></td>
                <td><?= number_format($recipe['Serving_size'])?></td>
                <td><?= number_format($recipe['Rating'])?></td>
                <td><?= number_format($recipe['Number_of_items'])?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No Recipes</p>
    <?php endif; ?>

</body>
</html>
