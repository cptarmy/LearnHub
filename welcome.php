<!-- welcome.php (Student Dashboard) -->
<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}
$user = $_SESSION['user'];
$user_id = $user['id'];

// Fetch student's enrolled courses
$sql = "SELECT courses.course_name FROM enrollments 
        JOIN courses ON enrollments.course_id = courses.id 
        WHERE enrollments.student_id = '$user_id'";
$result = $conn->query($sql);
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row['course_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }
        .dashboard {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
            width: 450px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .courses {
            text-align: left;
            margin-bottom: 20px;
        }
        .logout {
            padding: 10px 20px;
            background: #2575fc;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>
        <h3>Your Courses:</h3>
        <ul class="courses">
            <?php if (count($courses) > 0): ?>
                <?php foreach ($courses as $course): ?>
                    <li><?php echo htmlspecialchars($course); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No courses enrolled yet.</p>
            <?php endif; ?>
        </ul>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>


