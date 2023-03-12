<?php
require('db.php');

$database = new Database;

if (isset($_POST['submit'])
    && isset($_POST['username']) && isset($_POST['password'])
    && !empty($_POST['username']) && !empty($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE username = '$username'";
    $results = $database->select($sql);

    if(is_array($results)){

        $result = $results['password'];

        if($result == $password){
            session_start();
            $_SESSION['user_id'] = $results['id'];

            if ($results['role'] == "admin") {

                header('location:index.php');
            } else {
                header('location:home.php');
            }
        }
        else $ermsg = "credentials incorrect";
    }
    else $ermsg = "user not found in DB";
}
else $ermsg = "input required";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Login</title>
</head>
<body>

<div class="container">

    <?php
    if(isset($ermsg) && !empty($ermsg)) {
        echo '<div class="alert alert-danger" role="alert">'.$ermsg.'</div>';
    }
    ?>

    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="username">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>