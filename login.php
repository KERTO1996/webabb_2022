<?php
session_start();
require 'connection.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="csslogin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="photo/ss.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                    <div class="d-flex justify-content-center form_container">
                        <form action="checklogin.php" method="POST">
                            <label for="userName">User name</label>
                            <input type="text" class="form-control input_user" id="userName" name="user_name" placeholder="Enter your UserName" required>
                            <label for="userPassword">Password</label>
                            <input type="password" class="form-control input_pass" id="userPassword" name="user_password" placeholder="Enter your UserPassword" required>
                            <div class="form-group">
                            <div class="mt-4">
                                <div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" class="btn" value="Login">
                                </div>
                                <div class="d-flex justify-content-center links">
                                <a href="submit.php" class="form_link">Sign Up</a>
                                </div>
                                <div><?php if(isset($_GET['error'])){echo "<div class='alert alert-danger' role='alert'> something is wrong </div>";}?> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php







?>