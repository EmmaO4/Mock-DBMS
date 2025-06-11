<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Brand");
$brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Brand List</title>
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
    <h1>Brand Information</h1>


    <?php if ($brands): ?>
    <table>
        <thead>
            <tr>
                <th>brandID</th>
                <th>Logo</th>
                <th>Slogan</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brands as $brand): ?>
            <tr>
		<td><?= number_format(num: $brand['brandID'])?></td>
                <td><?= htmlspecialchars(string: $brand['logo']) ?></td>
                <td><?= htmlspecialchars(string: $brand['slogan']) ?></td>
                <td><?= htmlspecialchars(string: $brand['name']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No brands </p>
    <?php endif; ?>

</body>
</html>
