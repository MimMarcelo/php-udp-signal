<?php
/***
 * Referências 
 * https://www.binarytides.com/udp-socket-programming-in-php/
 */
print_r($_GET);

$lights = 8;
for($count = 0; $count < $lights; $count++){
    $value = filter_var($_GET["lampada"][$count], FILTER_SANITIZE_STRING);
    echo "<br>Lâmpada " . ($count+1) . ": $value";
}
//Reduce errors
error_reporting(~E_WARNING);

$server = '192.168.4.1';//'127.0.0.1';
$port = 555;

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";

$text = $_GET["lampada"];
if (filter_var($text, FILTER_VALIDATE_INT) === 0 || !filter_var($text, FILTER_VALIDATE_INT) === false) {
    $input = chr($text);
}
$int = $_GET["valor"];
if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
    $input .= chr($int);
}


//Send the message to the server
if( ! socket_sendto($sock, $input , strlen($input) , 0 , $server , $port))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Could not send data: [$errorcode] $errormsg \n");
}
header("Location: ../");