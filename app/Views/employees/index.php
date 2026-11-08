<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        table,th,td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Employees</h1>
    <a href="<?= site_url('employees/create') ?>">Add Employee</a>
    <table style="border:1px solid">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach($employees as $employee): ?>
            <tr>
                <td><?= esc($employee['id']) ?></td>
                <td><?= esc($employee['name']) ?></td>
                <td><?= esc($employee['email']) ?></td>
                <td><?= esc($employee['phone']) ?></td>
                <td><?= esc($employee['department']) ?></td>
                <td><?= esc($employee['status']) ?></td>
                <td><a href="<?=  site_url('employees/'. $employee['id']. '/edit') ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>