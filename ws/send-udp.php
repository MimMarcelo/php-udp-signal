<?php

require "../model/UDPSignal.php"; // Importação da classe de conexão UDP

// Obtém a instância da classe de conexão UDP
$udpSignal = UDPSignal::getInstance(); 

// Define o IP e a porta do serviço UDP
$udpSignal->setServer('127.0.0.1', 9999);

// Constroi a mensagem a ser enviada a partir dos dados recebidos pelo formulário
$input = "";
$text = $_GET["lampada"];
if (filter_var($text, FILTER_VALIDATE_INT) === 0 || !filter_var($text, FILTER_VALIDATE_INT) === false) {
    $input .= chr($text);
}
$int = $_GET["valor"];
if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
    $input .= chr($int);
}

// Envia a mensagem
$udpSignal->sendData($input);

// Redireciona para o formulário
header("Location: ../");