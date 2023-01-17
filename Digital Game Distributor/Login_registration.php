<?php
    session_start();
    $db = new mysqli("localhost","root","","digital_game_distributor");

    if(isset($_POST['reg-btn'])){
        $username = $_POST['user-name'];
        $useremail = $_POST['user-email'];
        $userps1 = $_POST['password_1'];
        $userps2 = $_POST['password_2'];

        if($userps1 == $userps2){
            $query = "INSERT INTO user_info(user_name,email, password) VALUES('$username','$useremail','$userps1')";
            $run = mysqli_query($db, $query);

            if($run){
                echo "<script>alert('Registration completed. Information is saved in databse');</script>";
                header('Location:index.php');
            }
            else{
                echo mysqli_error($db);
            }
        }
        else{
            echo "<script>alert('Confirm password does not match');</script>";
        } 
    }
    if(isset($_POST['Log-btn'])){
        $user_name = $_POST['username'];
        $user_password = $_POST['userpass']; 
        
        $mysqli = new mysqli("localhost","root","","digital_game_distributor");
        $sql = "SELECT * FROM user_info WHERE user_name = '$user_name' AND password='$user_password' ";
        $result = $mysqli->query($sql) or die($mysqli->error);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            if($row['user_name'] == $user_name && $row['password'] == $user_password){
                 echo "<script>alert('Log in Successful');</script>";
                 header('Location:index.php');
            }
        }
        else{
            echo "<script>alert('User name or password doesn't match');</script>";
        }
        $result->free();
        $mysqli->close();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <div class="Cover">
        <div class="Form">
            <br/>
            <p id="Msg">Digital Game Distributor</p>
            <div class="Button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-button" onclick="login()">Log in</button>
                <button type="button" class="toggle-button" onclick="register()">Registration</button>
            </div>
            <form action="Login_registration.php" method="POST" id="Log-in" class="user-input">
                <input type="text" class="input-field" name="username" placeholder="User Name" required>
                <input type="password" class="input-field" name="userpass" placeholder="Password" required>
                <button type="submit" name="Log-btn" class="submit-button">Go</button>
                <p id="msg2">Do not have any account ?<a onclick="register()"><b style="color: chartreuse;">Register</b></a></p>
            </form>

            <form action="Login_registration.php" method="POST" id="Register" class="registration-input">
                <input type="text" class="input-field" name="user-name" placeholder="User Name" required>
                <input type="text" class="input-field" name="user-email" placeholder="Email" required>
                <input type="password" class="input-field" name="password_1" placeholder="Password" required>
                <input type="password" class="input-field" name="password_2" placeholder="Confirm password" required>
                <button type="submit" name="reg-btn" class="submit-reg-button">Register</button>
                <p id="msg2">Already a member ?<a onclick="login()"><b style="color: chartreuse;">Log in</b></a></p>
            </form>
        </div>
    </div>

    <script>
        var userLogin = document.getElementById("Log-in");
        var userReg = document.getElementById("Register");
        var x = document.getElementById("btn");

        function login() {
            userLogin.style.left = "50px";
            userReg.style.left = "-400px";
            x.style.left = "0px";
        }

        function register() {
            userLogin.style.left = "-400px";
            userReg.style.left = "50px";
            x.style.left = "100px";
        }
    </script>
</body>

</html>