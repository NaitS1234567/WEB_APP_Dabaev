<?php
require_once('db.php');

if (isset($_COOKIE['user_id'])) {
    header("Location: /welcome.php");
    exit();
}

$error = '';
$link = mysqli_connect('db', 'root', 'eve@123', 'web_app_db');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Уязвимость: SQL-инъекция
    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = mysqli_query($link, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Уязвимость: Cookie без HttpOnly и Secure флагов
        setcookie("user_id", $user['id'], time() + 3600, "/");
        setcookie("username", $user['username'], time() + 3600, "/");
        
        header("Location: /welcome.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 400px;">
            <div class="card-body p-5">
                <h2 class="card-title text-center mb-4">Login</h2>
                
                <?php if($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Enter username" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Enter password" required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">Login</button>
                    
                    <div class="text-center">
                        <p>Don't have an account? <a href="/registration.php" class="text-decoration-none">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>