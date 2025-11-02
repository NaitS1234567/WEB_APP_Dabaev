<?php
require_once('db.php');

if (isset($_COOKIE['user_id'])) {
    header("Location: /welcome.php");
    exit();
}

$error = '';
$success = '';
$link = mysqli_connect('db', 'root', 'eve@123', 'web_app_db');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required!";
    } else {
        // Уязвимость: SQL-инъекция и хранение паролей в plain text
        $sql = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$password')";
        
        if (mysqli_query($link, $sql)) {
            $success = "Registration successful! You can now login.";
        } else {
            $error = "Error: " . mysqli_error($link);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 450px;">
            <div class="card-body p-5">
                <h2 class="card-title text-center mb-4">Register</h2>
                
                <?php if($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <?php if($success): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Choose username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               placeholder="Enter email" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Choose password" required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-success w-100 mb-3">Register</button>
                    
                    <div class="text-center">
                        <p>Already have an account? <a href="/login.php" class="text-decoration-none">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>