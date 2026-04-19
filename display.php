<?php
// ============================================================
//  display.php  —  Shows data from dept_employee_info as HTML table
// ============================================================
 
$host   = 'localhost';
$dbname = 'imdb';
$user   = 'rootadmin';   // change to your MySQL username
$pass   = '1234';       // change to your MySQL password
 
$rows = [];
$error = '';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $stmt = $pdo->query("SELECT * FROM dept_employee_info");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
} catch (PDOException $e) {
    $error = "Database error: " . htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department Employee Records</title>
    <style>
        body        { font-family: Arial, sans-serif; margin: 40px;
                      background: #f4f6f9; }
        h2          { color: #2c3e50; }
        table       { border-collapse: collapse; width: 100%;
                      background: white; border-radius: 8px;
                      overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th          { background: #2980b9; color: white; padding: 12px 15px;
                      text-align: left; }
        td          { padding: 10px 15px; border-bottom: 1px solid #ddd; }
        tr:hover td { background: #eaf4fb; }
        .badge      { background: #e8f4fd; color: #2980b9; padding: 3px 8px;
                      border-radius: 4px; font-size: 13px; }
        .error      { color: red; }
        caption     { caption-side: top; font-size: 18px; font-weight: bold;
                      margin-bottom: 10px; text-align: left; color: #2c3e50; }
    </style>
</head>
<body>
    <h2>🏢 Department Employee Records</h2>
 
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
 
    <?php elseif (empty($rows)): ?>
        <p>No records found. <a href="insert.php">Insert data first.</a></p>
 
    <?php else: ?>
        <?php foreach ($rows as $row):
            $employees = json_decode($row['employee_details'], true);
        ?>
 
        <h3>📁 Row #<?= $row['id'] ?> — <?= htmlspecialchars($row['department_name']) ?> Dept. | 📍 <?= htmlspecialchars($row['city_name']) ?></h3>
 
        <table>
            <caption>Department: <?= htmlspecialchars($row['department_name']) ?> | City: <?= htmlspecialchars($row['city_name']) ?></caption>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Hire Date</th>
                    <th>Job Title</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['id']) ?></td>
                    <td><?= htmlspecialchars($emp['first_name']) ?></td>
                    <td><?= htmlspecialchars($emp['last_name']) ?></td>
                    <td><?= htmlspecialchars($emp['hire_date']) ?></td>
                    <td><span class="badge"><?= htmlspecialchars($emp['job_title']) ?></span></td>
                    <td>$<?= number_format($emp['salary']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
 
        <?php endforeach; ?>
    <?php endif; ?>
 
</body>
</html>