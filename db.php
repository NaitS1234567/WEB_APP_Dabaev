<?php
require_once('db.php');

if (!isset($_COOKIE['user_id'])) {
    header("Location: /login.php");
    exit();
}

$link = mysqli_connect('db', 'root', 'eve@123', 'web_app_db');
$username = $_COOKIE['username'];

$welcome_message = "Привет, " . $username;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Welcome</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-success p-3">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Ivanov Web App</span>
            <div>
                <a href="/index.php" class="btn btn-light me-2">Home</a>
                <a href="/logout.php" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4 text-success mb-4"><?php echo $welcome_message; ?></h1>
                        <p class="lead">Welcome to your personal dashboard!</p>
                        <p class="text-muted">You have successfully accessed the protected welcome page.</p>
                        
                        <div class="mt-5">
                            <h5>Your Session Information:</h5>
                            <div class="alert alert-info text-start">
                                <strong>User ID:</strong> <?php echo $_COOKIE['user_id']; ?><br>
                                <strong>Username:</strong> <?php echo $_COOKIE['username']; ?><br>
                                <strong>Session active for:</strong> 1 hour
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>