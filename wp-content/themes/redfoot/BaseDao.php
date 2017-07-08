<?php 

use \PDO as PDO;

class BaseDao {

    private $conexao;
    private $user = 'mobilize_admin';
    private $pw = 'Mob123lize!@';//'mob123lize';
    private $dns = "mysql:host=138.68.29.236;dbname=mobilize_eventos";
    public $isTransaction = false;
    public $tableName;

    public function BaseDao($conexao = null) {
        if ($conexao == null) {
            try {
                $this->conexao = new PDO($this->dns, $this->user, $this->pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $e) {
                echo "<script>alert('teste')</script>";
                echo 'Connection failed: ' . $e->getMessage();
                $this->conexao = null;
            }
        } else {
            $this->conexao = $conexao;
        }
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function errorInfo() {
        return $this->conexao->errorInfo();
    }

    public function lastInsertId() {
        return $this->conexao->lastInsertId();
    }

    public function prepare($q) {
        return $this->conexao->prepare($q);
    }

    public function closeConexao() {
        $this->conexao = null;
    }

    public function query($q) {
        return $this->conexao->query($q);
    }

}