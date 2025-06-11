<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM SeasonTime");
$seasons = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Season Time</title>
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
    <h1>Season Time</h1>

    <?php if ($seasons): ?>
    <table>
        <thead>
            <tr>
                <th>Season</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seasons as $season): ?>
            <tr>
                <td><?= htmlspecialchars($season['season'])?></td>
                <td><?= date_format(new DateTime($season['start_date']), 'Y-m-d')?></td>
                <td><?= date_format(new DateTime($season['end_date']), 'Y-m-d')?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
