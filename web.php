<?php
// ============================================================
//  insert.php  —  Web page to insert JSON data into the DB
// ============================================================
 
// --- Database connection settings ---
$host   = 'localhost';
$dbname = 'imdb';
$user   = 'root';       // change to your MySQL username
$pass   = '';           // change to your MySQL password
 
$message = '';
 
// --- Handle button click ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
 
    // The JSON data (same as our JSON file)
    $employees = json_encode([
        [
            "id"         => 101,
            "first_name" => "Bruce",
            "last_name"  => "Wayne",
            "hire_date"  => "2018-03-15",
            "job_title"  => "Programmer",
            "salary"     => 75000
        ],
        [
            "id"         => 102,
            "first_name" => "Diana",
            "last_name"  => "Prince",
            "hire_date"  => "2019-07-22",
            "job_title"  => "Systems Analyst",
            "salary"     => 82000
        ],
        [
            "id"         => 103,
            "first_name" => "Clark",
            "last_name"  => "Kent",
            "hire_date"  => "2020-01-10",
            "job_title"  => "Network Engineer",
            "salary"     => 79000
        ]
    ]);
 
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $stmt = $pdo->prepare(
            "INSERT INTO dept_employee_info (city_name, department_name, employee_details)
             VALUES (:city, :dept, :emp)"
        );
        $stmt->execute([
            ':city' => 'Seattle',
            ':dept' => 'IT',
            ':emp'  => $employees
        ]);
 
        $message = "<p class='success'>✅ Data inserted successfully! Row ID: " . $pdo->lastInsertId() . "</p>";
 
    } catch (PDOException $e) {
        $message = "<p class='error'>❌ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Department JSON Data</title>
    <style>
        body        { font-family: Arial, sans-serif; max-width: 600px;
                      margin: 60px auto; background: #f4f6f9; }
        .card       { background: white; padding: 30px; border-radius: 10px;
                      box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2          { color: #2c3e50; }
        pre         { background: #f0f0f0; padding: 15px; border-radius: 6px;
                      font-size: 13px; overflow-x: auto; }
        button      { background: #2980b9; color: white; border: none;
                      padding: 12px 28px; font-size: 16px; border-radius: 6px;
                      cursor: pointer; margin-top: 15px; }
        button:hover{ background: #1a5f8a; }
        .success    { color: green; font-weight: bold; margin-top: 15px; }
        .error      { color: red;   font-weight: bold; margin-top: 15px; }
    </style>
</head>
<body>
<div class="card">
    <h2>📦 Insert JSON Data into Database</h2>
    <p>This will insert the following JSON record into <strong>dept_employee_info</strong>:</p>
 
    <pre>{
  "department_name": "IT",
  "city": "Seattle",
  "employees": [
    { "id": 101, "first_name": "Bruce",  "last_name": "Wayne",  "hire_date": "2018-03-15", "job_title": "Programmer",       "salary": 75000 },
    { "id": 102, "first_name": "Diana",  "last_name": "Prince", "hire_date": "2019-07-22", "job_title": "Systems Analyst",  "salary": 82000 },
    { "id": 103, "first_name": "Clark",  "last_name": "Kent",   "hire_date": "2020-01-10", "job_title": "Network Engineer", "salary": 79000 }
  ]
}</pre>
 
    <form method="POST">
        <button type="submit" name="insert">Insert Data</button>
    </form>
 
    <?= $message ?>
</div>
</body>
</html>