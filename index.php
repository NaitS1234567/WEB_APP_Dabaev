<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dabaev Aldar</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary p-3">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Dabaev Aldar Web Application</span>
            <?php if(isset($_COOKIE['user_id'])): ?>
                <a href="/welcome.php" class="btn btn-light">Welcome Page</a>
            <?php else: ?>
                <div>
                    <a href="/login.php" class="btn btn-light me-2">Login</a>
                    <a href="/registration.php" class="btn btn-outline-light">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to Dabaev Aldar Web App</h1>
                <p class="lead">Hehehe</p>
                
                <?php if(isset($_COOKIE['user_id'])): ?>
                    <div class="alert alert-success mt-4">
                        <h5>You are logged in!</h5>
                        <p>Visit the <a href="/welcome.php" class="alert-link">welcome page</a> to see your personalized greeting.</p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info mt-4">
                        <h5>Please login or register</h5>
                        <p>ili uhodite</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>