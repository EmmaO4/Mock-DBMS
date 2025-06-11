<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Item");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Items List</title>
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
    <h1>Items List</h1>

    <?php if ($items): ?>
    <table>
		<thead>
			<th>itemID</td>
        		<th>Name</th>
        		<th>Price (USD)</th>
			<th>Weight</th>
                	<th>Quantity</th>
                	<th>Expiration Date</th>
                	<th>Vegetarian</th>
                	<th>Lactose Free</th>
                	<th>Halal</th>
                	<th>Contain Peanut</th>
                	<th>Low Sodium</th>
                	<th>Perishable</th>
                	<th>Vegan</th>
                	<th>Reduced Fats</th>
               		<th>Refrigerate After Opening</th>
                	<th>Contains Soy</th>
                	<th>Gluten Free</th>
                	<th>Contains Wheat</th>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
		<td><?= number_format($item['itemID']) ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>$<?= number_format($item['price'], 2) ?></td>
		<td><?= htmlspecialchars($item['weight']) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
                <td><?= htmlspecialchars($item['expirationDate']) ?></td>
                <td><?= $item['vegetarian'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['lactoseFree'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['halal'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['containPeanut'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['lowSodium'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['perishable'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['vegan'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['reducedFats'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['refrigerateAfterOpening'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['containsSoy'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['glutenFree'] ? 'Yes' : 'No' ?></td>
                <td><?= $item['containsWheat'] ? 'Yes' : 'No' ?></td>
	    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No items </p>
    <?php endif; ?>

</body>
</html>
