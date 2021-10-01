<?php
    class Usuarios {

        private $id_user;
        private $tipo_usuario;
        private $email;
        private $senha;


        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function validarUsuario($dados_usuarios){
            foreach($dados_usuarios as $indice => $dados_unico_usuario){
                if($this->email == $dados_unico_usuario['email'] && $this->senha == $dados_unico_usuario['senha']){
                    
                    $_SESSION['autenticado'] = true ;                                   
                    $_SESSION['id_user'] = $dados_unico_usuario['id_user'];             
                    $_SESSION['tipo_usuario'] = $dados_unico_usuario['tipo_usuario'];   
                    
                    break;
                } else {
                    $_SESSION['autenticado'] = false ; 
                }
            }
            if($_SESSION['autenticado']){
                header('Location: tela_home.php'); 
              } else {
                header ('location: index.php?erro=1');
            }
        }

    }
    
    
?>