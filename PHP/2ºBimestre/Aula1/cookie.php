<?php
$cookie_name = "user";
$cookie_value = "Martarelli";
setcookie($cookie_name, $cookie_value, time()+(86400 * 30),"/");
?>

<html>
<body>
<?php
if(!isset($_COOKIE[$cookie_name])){
    echo "Cookie Name " . $cookie_name . "is not set"; 
} else {
    echo "Cookie " . $cookie_name . "is set<br/>";
    echo "Value is ". $cookie_value ;
}

?>


</body>
</html>