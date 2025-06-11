<?php
require_once 'connect.php';

$stmt = $conn->query("SELECT * FROM Is_department_in");
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Departmentin</title>
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
    <h1>Is Department In</h1>

    <?php if ($departments): ?>
    <table>
        <thead>
            <tr>
                <th>DepartmentID</th>
                <th>StoreID</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $department): ?>
            <tr>
                <td><?= number_format($department['DepartmentID'])?></td>
                <td><?= htmlspecialchars($department['storeID'])?></td>


            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Empty</p>
    <?php endif; ?>

</body>
</html>
