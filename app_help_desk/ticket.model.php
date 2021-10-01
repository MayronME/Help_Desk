<?php
    class ticket {
        private $tipo;      
        private $gravidade; 
        private $categoria; 
        private $titulo;    
        private $descricao; 
        private $id_user;
        private $dados;
        private $id_ticket;
        private $status;
        private $organizacao;
        private $where;
        private $prioridade;
        private $data;

        public function __get($atributo){
            return $this->$atributo;
        }
        
        public function __set($atributo,$valor){
            $this->$atributo = $valor;
        }

        public function abrirChamado(){
            $count =  5;
            if($this->tipo == 'Incidente' || $this->tipo == 'Requisição'){
                $count--;
            } 
            if ( strlen($this->gravidade) == '1' && $this->gravidade >= 1 && $this->gravidade <= 5 ){
                $count--;
            }
            if ( strlen($this->categoria) == '1' && $this->categoria >= 1 && $this->categoria <= 6 ){
                $count--;
            }
            if ( strlen($this->titulo) > 1){
                $count--;
            }
            if ( strlen($this->descricao) > 1){
                $count--;
            }
            if($count != 0){
                header('Location: tela_abrir_chamado.php?inclusao=2');
            } 
            
        }
    
        public function TratarTodosChamados($todos_ticket_banco,$todos_status_ticket_banco,$busca_personalizada){
            $todos_dados_usuario = array();
            
            if ($_SESSION['tipo_usuario'] == 2){
                foreach ($todos_ticket_banco as $key_banco => $ticket) {
                    if($ticket['fk_id_user'] == $_SESSION['id_user']){
                        $todos_dados_usuario[] =  $todos_ticket_banco[$key_banco];
                    }
                }
                $todos_ticket_banco = $todos_dados_usuario;
            }

            foreach ($todos_dados_usuario as $i => $value) { // limpar array
                unset($todos_dados_usuario[$i]);
            }

            if(count($busca_personalizada) == 2){
                foreach ($todos_ticket_banco as $key_banco => $ticket) {
                    if($ticket[$busca_personalizada['where']] == $busca_personalizada['organizar']){
                        $todos_dados_usuario[] =  $todos_ticket_banco[$key_banco];
                    }
                }
                $todos_ticket_banco = $todos_dados_usuario;
            }

            foreach ($todos_ticket_banco as $key_banco => $ticket) {
                $todos_ticket_banco[$key_banco]['data'] = date('d/m/Y', strtotime($ticket['data']));
                $todos_ticket_banco[$key_banco]['titulo'] = mb_strimwidth($ticket['titulo'], 0, 26, "...");
                $todos_ticket_banco[$key_banco]['descricao'] = mb_strimwidth($ticket['descricao'], 0, 67, "...");

                foreach ($todos_status_ticket_banco as $key_status => $status) {
                    if($status['indice'] ==  $ticket['prioridade']){
                        $todos_ticket_banco[$key_banco]['prioridade'] = $status['valor_nome'];
                    }
                }
            }
            return $todos_ticket_banco;
        }

        public function alterarPrioridade($prioridade){
            
            return $prioridade;
            /*
            2  1+1 Muito Baixo
            3  1+2 Muito Baixo

            4  1+3 2+2 Baixo
            5  1+4 2+3 Baixo

            6  1+5 2+4 3+3 Médio

            7  2+5 3+4 Alto
            8  3+5 4+4 Alto

            9  4+5 Muito Alto
            10 5+5 Muito Alto
            */
        }
        
    }
    
?>