<?php
function console($data){
    $output=$data;
    if (is_array($output)){
        $output = implode(',', $output);
    }
echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
function connect($sever,$username,$password,$db,$table){
    $mysql_connect=mysqli_connect($sever,$username,$password);
    if($mysql_connect){
        $a="Connect sussess!";
        console($a);
    }else {
        $a="Unable to connect";
        console($a);
        die("");
    }
    $db_selected=mysqli_select_db($mysql_connect,$db);
    if(!$db_selected){
        $sql="CREATE DATABASE $db";
        if(!mysqli_query($mysql_connect,$sql)){
            $a="Error to create database";
            console($a);
            die("");
        }
    }
    $sql_table="CREATE TABLE IF NOT EXISTS $table(USERNAME VARCHAR(100) UNIQUE, PASSWORD_HASH CHAR(40), PHONE VARCHAR(10));";
     if(!mysqli_query($mysql_connect,$sql_table)){
        $a="Error to create table";
        console($a);
        die($a);
     }
     return $mysql_connect;
}
function check_insert($mysql_connect,$table,$user,$pass,$phone){
    $check_user="SELECT * FROM $table WHERE USERNAME='$user';";
    $resultCk=mysqli_query($mysql_connect,$check_user);
    while($row=mysqli_fetch_array($resultCk)){
       return true;
    }
    return false;
}
function check_login($mysql_connect,$table,$user,$pass){
    $check_user="SELECT * FROM $table WHERE USERNAME='$user' AND PASSWORD_HASH = SHA1('$pass');";
    $result=mysqli_query($mysql_connect,$check_user);
    while($row=mysqli_fetch_array($result)){
        return true;
    }
    return false;
}
function check_login_cookie($mysql_connect,$table,$user){
    $check_user="SELECT * FROM $table WHERE USERNAME='$user';";
    $result=mysqli_query($mysql_connect,$check_user);
    while($row=mysqli_fetch_array($result)){
        return true;
    }
    return false;
}

?>
<?php
 