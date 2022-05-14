<?php require 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="csssub.css">
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
                        <form action="adduser.php" method="POST">

                                <label for="userName">User Name</label>
                                <input class="form-control input_user" type="text" id="userName" name="user_name">
                                <label for="email">Email</label>
                                <input class="form-control input_user" type="text" id="email" name="email">
                                <label for="pwd">Password</label>
                                <input class="form-control input_pass" type="password" id="userPassword" name="password">
                                <label for="firstName">First Name</label>
                                <input class="form-control input_user" type="text" id="firstName" name="first_name">
                                <label for="lastName">Last Name</label>
                                <input class="form-control input_user" type="text" id="lastName" name="last_name">
                                <label for="dateBirth">Date of Birth</label>
                                <input type="date" class="form-control" id="dateBirth" name="date_birth">
                                <label for="address">Address</label>
                                <input class="form-control input_user" type="text" id="address" name="address">
                                <label for="phoneNo">Phone Number</label>
                                <input class="form-control input_user" type="text" id="phoneNo" name="phone_no">
                                <label>Gender</label>
                                <div class="form-control">
                                    <input type="radio" id="gender" name="gender" value="male">
                                    <label for="business">male</label>
                                    <input type="radio" id="gender" name="gender" value="female">
                                    <label for="premium">female</label>
                                </div>
                                <label for="agree">Agree</label>
                                <input type="checkbox" id="customControlInline" name="agree">
                                <label for="agree">I agree to the terms and conditions</label>
                                <input type="submit" class="btn login_btn" value="Register" name="register">
                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>