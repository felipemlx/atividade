<?php
//Nessa classe apliquei o design pattern de SINGLETON, que seria uma classe que vai ter só 1 objeto instanciado. No caso seria essa classe Database em que a conexão seria criada
//1 vez (1 objeto) e reaproveitada.
class Database {
    private static $instancia = null;
    private $conexao;
    private $host = 'localhost';
    private $db   = 'lista_tarefas';
    private $usuario = 'root';
    private $senha = '';

    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
        $this->conexao = new PDO($dsn, $this->usuario, $this->senha);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    public function getConnection() {
        return $this->conexao;
    }
}
