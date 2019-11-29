<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mua Re</title>
</head>
<body>
    <h1> Bach hoa cua ban</h1>
    <?php
   session_start();
   if(isset($_SESSION["user"])){
       $a=$_SESSION["user"];
       echo" session la: $a";
   echo"<h2> Chao mung ban den voi mua re .com</h2>";
  }else{header("Location: http://localhost:81/test/login.php");}

    
    ?>
    <a href="./logout.php"> Logout</a>

</body>
</html>