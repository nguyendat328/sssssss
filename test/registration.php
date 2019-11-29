<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
    <h1> Sign Up Your Account - Very Easse</h1>
    <h2> Fill infomation to the form:</h2>
    <form method="POST">
        <p>UserName</p>
        <input type="text" name="txtUser"  placeholder="UserName"> 
        <p>PassWord</p>
        <input type="password" name="txtPass" placeholder="PassWord">
        <p>Phone Number</p>
        <input type="text" name="txtPhone" placeholder="PhoneNumber"> 
        <input type="submit" value="Sign Up">

    </form>
    <?php include './database.php';?>
    <?php
    $db="abc123";
    $table="abc123users";
    $user = $pass = $phone ="";
    function test_data($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
      if(isset($_POST["txtUser"])&& isset($_POST["txtPass"])&& isset($_POST["txtPhone"])){
        if(isset($_POST["txtUser"])&& isset($_POST["txtPass"])&&isset($_POST["txtPhone"])){
            $user=test_data($_POST["txtUser"]);
            $pass=test_data($_POST["txtPass"]);
            $phone=test_data($_POST["txtPhone"]);
            
            $mysql_connect = connect("localhost","root","",$db,$table);
            if(check_insert($mysql_connect,$table,$user,$pass,$phone)==true){
                echo "This UserName has Used. Please choose other UserName!<br>";
            }else{
                $insert_sql="INSERT INTO $table(USERNAME,PASSWORD_HASH,PHONE) VALUES('$user',SHA1('$pass'),'$phone');";
                $resultIns=mysqli_query($mysql_connect,$insert_sql);
                echo"Congratulations you Registration Successfully!<br>";
                echo"Your Account is: <br>";
                echo"UserName: $user<br>";
                echo"PassWord: $pass<br>";
                echo"Phone Number: $phone<br>";
            }
            

        }echo" Please fill full to the form<br>";
    }

    ?>
</body>
</html>