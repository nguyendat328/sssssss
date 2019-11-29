<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
<h1> Tính tích phân từ a đến b của f(x)= x^3 +2x^2+3</h1>
    <p>số A</p>
    <input type="text" name="soA">
    <p>số B</p>
    <input type="text" name="soB">
    <input type="submit" value="submit">
</form>
<?php
$a=$_POST["soA"];
$b=$_POST["soB"];
$dt = ($b-$a)/100;
$KQ=0;
$k=0;
for($i=$a;$i<$b;$i=$i+$dt){
global $KQ;
    $k=$i*(pow($i,3)+2*pow($i,2)+3);
$KQ=$KQ+$k;

}
echo "Tích phân từ $a đến $b của hàm số đã cho là: $KQ <br>";

?>

</body>
</html>