<?php

/***
 * Responsável por criar a conexão UDP e envio de mensagens
 * 
 * Referências 
 * https://www.binarytides.com/udp-socket-programming-in-php/
 * 
 * Padrões:
 * - Singleton (https://imasters.com.br/back-end/o-padrao-singleton-com-php)
 */
class UDPSignal{
    
    // Variáveis privadas *****************************************

    private string $server;              // Endereço IP do serviço UDP
    private int $port;                   // Porta de escuta do serviço UDP
    private static Socket|false $socket; // Socket de conexão
    private static ?UDPSignal $instance = null; // Instância Singleton

    // Métodos públicos *****************************************

    /**
     * Método que cria|retorna a instância Singleton da classe UDPSignal
     */
    public static function getInstance(): self
    {
        if(self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Define o endereço IP e porta do serviço UDP
     */
    public function setServer(string $server_ip, int $server_port): void
    {
        self::$instance->server = $server_ip;
        self::$instance->port = $server_port;
    }

    /**
     * Envia a $message através do $soket de conexão
     */
    public function sendData(string $message): bool
    {
        // Verifica se as informações do serviço UDP já foram definidas
        if(!isset(self::$instance->server) || !isset(self::$instance->port)){
            die("Call setServer(\$server_ip, \$server_port) before \n");
        }

        // Envia a mensagem
        if(!socket_sendto(
            self::$socket,           // Socket
            $message,                // Mensagem
            strlen($message),        // Buffer
            0,                       // Flags
            self::$instance->server, // IP do serviço UDP
            self::$instance->port)   // Porta do serviço UDP
        )
        {
            // Se a mensagem não foi enviada
            $error_code = socket_last_error();
            $error_message = socket_strerror($error_code);
            
            die("Could not send data: [$error_code] $error_message \n");
        }

        return true; // Mensagem enviada
    }

    // Métodos privados *****************************************

    /**
     * Cria uma nova instância da classe UDPSignal
     * Cria o $socket de conexão
     * 
     * Padrão Singleton
     */
    private function __construct()
    {
        // Cria o socket de conexão
        if(!(self::$socket = socket_create(AF_INET, SOCK_DGRAM, 0)))
        {
            // Se o socket não foi criado
            $error_code = socket_last_error();
            $error_message = socket_strerror($error_code);
            
            die("Couldn't create socket: [$error_code] $error_message \n");
        }
    }

    /**
     * Sobrescreve o método de clone de instância
     * 
     * Padrão Singleton
     */
    private function __clone()
    {
    }

    /**
     * Sobrescreve o método de wakeup de instância
     * 
     * Padrão Singleton
     */
    private function __wakeup()
    {
    }
}