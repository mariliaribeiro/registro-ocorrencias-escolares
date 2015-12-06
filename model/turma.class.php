<?php
    class turma{
    /*------------------VAR------------------------*/
        private $turma;
        private $curso;
        
    /*------------------GET------------------------*/
        function getTurma(){
            return $this->turma;    
        }    
        function getNomeCurso(){
            return $this->nome_curso;   
        }   
    /*------------------SET------------------------*/
        function setTurma($turma){
            return $this->turma = $turma;   
        }    
        function setNomeCurso($nome_curso){
            return $this->nome_curso = $nome_curso; 
        }    

    /*------------------DEMAIS FUNÇÕES------------------------*/
        function insertTurma($colecao){
            $query = array(
                'tipo' => 'turma',
                'nome_turma' => $this->turma,
                'curso' => $this->curso);
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }

         function deleteTurma($colecao, $id){
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Turma removida com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_turmas.php">';   
        }
        
        function updateTurma($colecao, $id){
            $query = $colecao->findone(array('_id' => $id));

            $query['nome_turma'] = $this->turma;
            $query['curso'] = $this->curso;
            $query['tipo'] = 'turma';
            $query['_id'] = $id;
            
            $colecao->save($query); //Atualiza o documento
            echo('Turma alterada com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_turmas.php">';   
            
        }

        function getTurmas() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'turma'); //filtra os dados com o tipo: curso
            $proje = array('nome_turma' => 1, 'curso'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo('
                        <tr>  
                            <td  class="collapsing">
                                <div class="ui small basic icon buttons">
                                    <a href="http://localhost/web1/projeto/template/update_turma.php?id='.$campo['_id'].'">
                                        <button class="ui button" type="button"><i class="edit icon"></i></button>
                                    </a>
                                    
                                    <a href="http://localhost/web1/projeto/template/delete_turma.php?id='.$campo['_id'].'">
                                        <button class="ui button" type="button">
                                            <i class="trash outline icon"></i></button>                                            
                                    </a>
                                </div>
                            </td>
                            <td>'.$campo['nome_turma'].'</td>
                            <td>'.$campo['curso'].'</td>
                        </tr>
                    ');
            }
        }

        function selectTurma(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'turma'); //filtra os dados com o tipo: curso
            $proje = array('_id' => 1, 'nome_turma' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            foreach ($cursor as $campo) {
                echo(' <option value="'.$campo['_id'].'">'.$campo['nome_turma'].'</option>');
            }
        }
    }
?>
