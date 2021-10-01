<?php 
    class Connection {   //class que sera chamada para usar as funções

        private $host = 'localhost';
        private $dbname = 'help_desk';
        private $user = 'root';
        private $pass = '';

        public function conectar(){ //função responsavel por conectar
            try{
                $conexao_com_banco =  new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->pass");
                return $conexao_com_banco;
            } catch(PDOException $e){
                echo '<p>'.$e->getMesssege().'</p>';
            }
        }
    }
?>