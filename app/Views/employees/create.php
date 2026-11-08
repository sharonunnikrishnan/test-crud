<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <?php if(session()->has('errors')): ?>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= esc($error) ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post" action="<?= site_url('employees/store') ?>">
        Name
        <input type="text" name="name"><br><br>
        Email
        <input type="email" name="email"><br><br>
        Phone
        <input type="text" name="phone"><br><br>
        Department
        <input type="text" name="department"><br><br>
        Status
        <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select><br><br>

        <button type="submit">Save Employee</button>
    </form>

    <a href="<?= site_url('employees') ?>">Back to Employees</a>
</body>
</html>