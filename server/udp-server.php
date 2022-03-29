<?php
/***
 * Referências
 * https://www.binarytides.com/udp-socket-programming-in-php/
 */
// Reduz a quantidade de mensagens de eventuais erros
error_reporting(~E_WARNING);

// Cria o socket UDP
if(!($socket = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
	// Se o socket não foi criado
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";

// Ativa o soket
if( !socket_bind($socket, "0.0.0.0" , 9999) )
{
	// Se o socket não foi ativado
	$errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    
    die("Could not bind socket : [$errorcode] $errormsg \n");
}

echo "Socket bind OK \n";

echo "Waiting for data ... \n";

// Aguarda pelo recebimento de mensagens
while(true)
{
	// Recebe dados
	$r = socket_recvfrom($socket, $buf, 512, 0, $remote_ip, $remote_port);
	echo $buf . "\n";
}

// Encerra o socket
socket_close($socket);