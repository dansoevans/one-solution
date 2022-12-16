<?php
session_start();
if (isset($_SESSION["user"])) {
    //    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
    </head>
<style>
    body{
    padding:50px;
    
}
.container{
    max-width: 600px;
    margin:70px auto;
    padding:50px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.form-group{
    margin-bottom:30px;
}

.reg-head{
    display: flex;
    align-self: center;
    justify-content: center;
padding-right: 12px;
}
.reg-head h3{
    padding-top: 29px;
     
}
@media (max-width:500px) {
    body{
    padding:20px;
}
.container{
    max-width: 600px;
    margin:0 auto;
    padding:30px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.reg-head{
    display: flex;
    align-self: center;
    justify-content: center;
padding-right: 12px;
}
.reg-head h3{
    padding-top: 25px;
    font-size: 18px; 
}
}
</style>
    <body>
    <div class="reg-head" >
<img style="width: 100px; height:100px" src="logo.png" alt="">
<h3> <span style="color:rgb(216, 152, 33) ;" > Sign in your</span> One solution POS Account</h3>
</div>
        <div class="container">
            <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM register_data WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: item-list.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" value="Login" name="login" class="btn btn-primary form-control">
                </div>
            </form>
            <div class="py-4">
                <p>Not registered yet? <a style="text-decoration: underline; color: blue;" href="registration.php">Register Here</a></p>
            </div>
        </div>
    </body>

</html>