<!DOCTYPE html>
<html lang="en">
<head>
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta HTTP-EQUIV="Expires" CONTENT="-1">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

<?php
# PostgreSQL connection
$servername = "4.227.176.236";
$username = "hasan";
$password = "1";
$dbname = "database";
$port = "30010";

try {
    $pdo = new PDO('pgsql:host=' . $servername . ';port=' . $port . ';dbname=' . $dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Fetch data from PostgreSQL
    $sql  = "SELECT * FROM employees";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $source = '<h3>Data from PostgreSQL Server</h3>';

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

echo $source . '<br>';

# Show the Frontend Part
?>
 <table id="employee_grid" class="table" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Hired on</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($employees as $key => $emp) :?>
        <tr>
            <td><?php echo $emp['emp_no'] ?></td>
            <td><?php echo $emp['first_name'] ?></td>
            <td><?php echo $emp['last_name'] ?></td>
            <td><?php echo $emp['birth_date'] ?></td>
            <td><?php echo $emp['gender'] ?></td>
            <td><?php echo $emp['hire_date'] ?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>


