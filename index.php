<?php
include("./Acces_DB/Connexion.php");
$dbc = get_db();
session_start();
error_reporting(0);

if (isset($_POST['signIn'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE login_='$email' AND password_='$password' and statu='eleve'";
    $result = $dbc->query($sql);
    if ($result->num_rows > 0) {
        $row  = $result->fetch_array(MYSQLI_ASSOC);
        // header("Location: index.php");
        echo "<script>alert('good.eleve')</script>";

    } else {
        $sql = "SELECT * FROM user WHERE login_='$email' AND password_='$password' and statu='prof'";
        $result = $dbc->query($sql);
        if ($result->num_rows > 0) {
            $row  = $result->fetch_array(MYSQLI_ASSOC);
            // header("Location: index.php");
            echo "<script>alert('good. prof')</script>";
    
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong')</script>";
        }
    } 
}

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .flex-container>form {
            background-color: #FFEEE4;
            margin: 10rem 20rem;
            padding: 20px;
            font-size: 30px;
            border-radius: 10px;
            width: 50%;
            text-align: center;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
        }

        .flex-container>form>h2 {
            margin-top: 15px;
            font-family: 'Rufina', serif;
            color: #74684E;
        }

        .flex-container>form>h4,
        .flex-container>form>h6 {
            margin-top: 26px;
            font-family: 'Rufina', serif;
        }

        .textbox_login {
            display: block;
        }

        .textbox_login>.text_login {
            margin-top: 41px;
            border: none;
            border-radius: 10px;
            padding: 5px;
            width: 80%;
            margin-right: 0%;
            font-size: 1rem;
        }
        .text_login::placeholder{
            font-size: 15px;
        }
        .flex-container>form>.btn_login {
            font-family: 'Rufina', serif;
            width: 70%;
            margin-top: 15%;
            margin-bottom: 5%;
            border-radius: 10px;
            background: #453232;
            color: #fff;
            border: none;
            font-size: 1.5rem;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="flex-container">
            <form action="index.php" method="POST" enctype="multipart/form-data" id="box_rigth">
                <h2>WELCOME BACK</h2>
                <h4>Nice to see you again!</h4>
                <h6>Sign in below with your details</h6>
                <div class="textbox_login">
                    <input type="text" class="text_login" name="username" value="<?php //echo $email; 
                                                                                    ?>" placeholder=" Email Address" required="required" />
                    <input type="password" class="text_login" name="password" value="<?php //echo $_POST['password']; 
                                                                                        ?>" placeholder=" Password" required="required" />
                    <div style="font-size:11px; color:#cc0000; margin-top:10px"></div>
                </div>
                <input type="Submit" value=" SIGN IN " name="signIn" class="btn_login " />
                <!-- <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p> -->
            </form>
        </div>
    </div>
</body>

</html>