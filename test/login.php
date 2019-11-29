<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1> Wellcome to my page</h1>
    <h2> Fill UserName and Password</h2>
    <form method="POST">
        <p>UserName</p>
        <input type="text" name="txtUser" id="user" placeholder="UserName"> 
        <p>PassWord</p>
        <input type="password" name="txtPass" placeholder="PassWord">
        <br>
        <input type="checkbox" name="txtRem" value="check">Remenber Me<br>
        <input type="submit" value="Sign In" >
        <input type="submit" name="SignUp" value="Sign Up">

    </form>
    <?php include './database.php';?>
    <?php
    session_start();
    $db="abc123";
    $table="abc123users";
    $user = $pass = "";
    function test_data($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST["SignUp"])){
        header("Location: ./registration.php");
    }
    if(isset($_SESSION["user"])){
        echo" Wellcome to website, you login successfully!<br>";
        echo" <form method='POST'> <input type='submit' name='txtLogout' value='Logout'></form><br>";
   }
   
          
    if(isset($_POST["txtUser"])&& isset($_POST["txtPass"])){
        if(isset($_POST["txtUser"])&& isset($_POST["txtPass"])){
            $user=test_data($_POST["txtUser"]);
            $pass=test_data($_POST["txtPass"]);
            $mysql_connect = connect("localhost","root","",$db,$table);
            if(check_login($mysql_connect,$table,$user,$pass)==true){
                $_SESSION["user"]=true;
                echo" Wellcome to website, you login successfully!<br>";
                echo"<form method='POST'> <input type='submit' name='txtLogout' value='Logout'></form><br>";           
               if(isset($_POST["txtRem"])){
                   setcookie("user",$user,time()+86400,"/");
               }

            }
        }echo" Please fill to the form<br>";
    }
    if(isset($_POST["txtLogout"])){
        session_destroy();
        header("Location: ./login.php");
        setcookie("user","",time()+86400,"/");
    }
    if(isset($_COOKIE["user"])){
        $user_cookie=$_COOKIE["user"];
        $mysql_connect = connect("localhost","root","",$db,$table);
                if(check_login_cookie($mysql_connect,$table,$user_cookie)==true){
                    echo" Wellcome to website, you login successfully!<br>";
                    echo"<form method='POST'> <input type='submit' name='txtLogout' value='Logout'></form><br>";  
       echo "cookie $user_cookie";
                }
    }
    ?>
</body>
</html>