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
        /*function insertTurma($colecao){
            //$condicao = array("nome_turma" => $this->turma);
            //$busca = $colecao->findone($condicao);

            //if($this->turma != $cursor['turma']){
                $query = array(
                        'tipo' => 'turma'
                        'nome_turma' => $this->turma);
                        //'curso' => $this->curso);
                $colecao->insert($query);
                echo('Dados inseridos com sucesso!');
                echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
            //}else{
                //echo('Não foi possível inserir registro, turma já cadastrada!');
            //}
        }*/

        function updateAluno(){
            include '../mongo/conexao.php';
            
            $filtro = ['tipo' => 'turma','nome_turma'=>$this->turma];
            $update = ['$set'=> ['curso'=>$this->curso]];
            $query = [$filtro, $update];
            $colecao->update($query);
            echo('Dados alterados com sucesso!');
            
        }

        function deleteTurma($colecao, $id){
            //$condicao = array("nome_turma" => $this->turma);
            //$busca = $colecao->findone($condicao);
            //$id = $cursor['_id'];
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Turma removida com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_turmas.php">';
        }

        function getTurmas() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'turma'); //filtra os dados com o tipo: curso
            $proje = array('nome_turma' => 1, 'curso'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo('
                        <tr data-id='.$campo['_id'].'>  
                            <td  class="collapsing">
                                <div class="ui small basic icon buttons">
                                    <a class="abutton" href="update_turma.php?id='.$campo['_id'].'">
                                        <button class="ui button" type="button"><i class="edit icon"></i></button>
                                    </a>
                                    
                                    <a class="abutton" href="delete_turma.php?id='.$campo['_id'].'">
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
