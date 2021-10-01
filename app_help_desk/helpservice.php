<?php
    class HelpService {
        
        private $conexao_com_banco;
        private $dados_do_ticket_ou_usuario;

        public function __construct(Connection $conexao_com_banco, $dados_do_ticket_ou_usuario){
            $this->conexao_com_banco = $conexao_com_banco->conectar();
            $this->dados_do_ticket_ou_usuario = $dados_do_ticket_ou_usuario;
        }
        
        public function inserirDadosTicket(){
            $this->dados_do_ticket_ou_usuario->abrirChamado();
            $query = 
            'INSERT INTO 
                tb_ticket(fk_id_user,tipo,categoria,gravidade,titulo,descricao,prioridade) 
            VALUES 
                (:id_user,:tipo,:categoria,:gravidade,:titulo,:descricao,:prioridade)';

            $stmt = $this->conexao_com_banco->prepare($query);
            $stmt->bindValue(':id_user', $this->dados_do_ticket_ou_usuario->__get('id_user'));
            $stmt->bindValue(':tipo', $this->dados_do_ticket_ou_usuario->__get('tipo'));
            $stmt->bindValue(':categoria', $this->dados_do_ticket_ou_usuario->__get('categoria'));
            $stmt->bindValue(':gravidade', $this->dados_do_ticket_ou_usuario->__get('gravidade'));
            $stmt->bindValue(':titulo', $this->dados_do_ticket_ou_usuario->__get('titulo'));
            $stmt->bindValue(':descricao', $this->dados_do_ticket_ou_usuario->__get('descricao'));
            $stmt->bindValue(':prioridade', $this->dados_do_ticket_ou_usuario->__get('gravidade'));
            $stmt->execute(); 
            header('Location: tela_abrir_chamado.php?inclusao=1');
        }
        
        public function recuperarUsuarios(){
            $query = 
            'SELECT 
                id_user, nome, email, senha, tipo_usuario 
            FROM 
                tb_users';

            $stmt = $this->conexao_com_banco->query($query);
            $lista_todos_usuarios_do_banco = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $lista_todos_usuarios_do_banco;
        }

        public function recuperarTicket(){
            
            $query = 
            'SELECT 
                t.id_ticket,t.fk_id_user, t.gravidade, t.status, t.urgencia, c.categoria, t.prioridade, t.data, t.titulo, t.descricao
            FROM 
                tb_ticket as t 
            INNER JOIN 
                tb_categoria as c
            ON
                (t.categoria = c.indice)
            where 
                1
            ORDER BY 
                `t`.`id_ticket` 
            DESC';
         
            $stmt = $this->conexao_com_banco->query($query);
            $lista_ticket = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            return $lista_ticket;
        }

        public function recuperarStatusTicket(){
            $query =
            'SELECT
                *
            FROM
                tb_status_ticket
            ';

            $stmt = $this->conexao_com_banco->query($query);
            $lista_status_ticket = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $lista_status_ticket;
        }

        public function recuperarTicketUnico(){
            $where = $this->dados_do_ticket_ou_usuario->__get('where');
            $organizacao = $this->dados_do_ticket_ou_usuario->__get('organizacao');
            $query = 
            'SELECT 
                t.*, u.nome
            FROM 
                tb_ticket as t 
            LEFT JOIN
                tb_users as u 
            ON 
                (t.fk_id_user = u.id_user)
            WHERE 
                1 AND '.$where.' = :organizar';

            $stmt = $this->conexao_com_banco->prepare($query);
            $stmt->bindValue(':organizar', $organizacao);
            $stmt->execute();
            $lista_ticket = $stmt->fetchAll(PDO::FETCH_ASSOC); 
           
           $query = 
            'SELECT  * FROM tb_status_ticket';
            $stmt = $this->conexao_com_banco->query($query);
            $status_ticket = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            foreach ($status_ticket as $indice => $valor_nome){
                if( $valor_nome['indice'] == $lista_ticket[0]['urgencia']){
                    $lista_ticket[0]['urgencia'] = $valor_nome['valor_nome'];
                }
                if( $valor_nome['indice'] == $lista_ticket[0]['gravidade']){
                    $lista_ticket[0]['gravidade'] = $valor_nome['valor_nome'];
                }
                if( $valor_nome['indice'] == $lista_ticket[0]['prioridade']){
                    $lista_ticket[0]['prioridade'] = $valor_nome['valor_nome'];
                }
            }
           foreach($lista_ticket as $indice => $ticket){
                $lista_ticket[$indice]['data'] = date('d/m/Y H:i:s' , strtotime($ticket['data']));
            }
            return $lista_ticket;
        }
        public function atualizarDados($url){
            $id_ticket = $this->dados->__get('id_ticket');
            $gravidade = $this->dados->__get('gravidade');
            $status = $this->dados->__get('status');

            if (strlen($gravidade) >= 1){
                $query = 
                    'UPDATE
                tb_ticket
                    SET
                urgencia = :gravidade 
                    WHERE
                id_ticket = :id_ticket';
                 $stmt = $this->conexao_com_banco->prepare($query);
                 $stmt->bindValue(':gravidade',$gravidade);
                 $stmt->bindValue(':id_ticket',$id_ticket);
                 $stmt->execute();
            }
            if (strlen($status) >= 1){
                $query = 
                    'UPDATE
                tb_ticket
                    SET
                status = :status_ticket 
                    WHERE
                id_ticket = :id_ticket';
                 $stmt = $this->conexao_com_banco->prepare($query);
                 $stmt->bindValue(':status_ticket',$status);
                 $stmt->bindValue(':id_ticket',$id_ticket);
                 $stmt->execute();
            }
            header('Location:'.$url.'&alteracao=1');
        }
    }

?>