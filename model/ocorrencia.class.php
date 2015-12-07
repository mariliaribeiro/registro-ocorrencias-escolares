<?php
    class ocorrencia{

/*------------------VAR------------------------*/
        private $nomeProf; 
        private $nomeAluno;
        private $cpf;
        private $matricula;
        private $turma;
        private $disciplina;
        private $hora;
        private $ocorrencia;

/*------------------GET------------------------*/
        function getNomeProf(){
            return $this->nomeProf;
        }

        function getNomeAluno(){
            return $this->nomeAluno;
        }

        function getCpf(){
            return $this->cpf;
        }

        function getMatricula(){
            return $this->matricula;
        }

        function getTurma(){
            return $this->turma;
        }

        function getDisciplina(){
            return $this->disciplina;
        }

        function getHora(){
            return $this->hora;
        }

        function getOcorrencia(){
            return $this->ocorrencia;
        }
        
/*------------------SET------------------------*/
        function setNomeProf($nomeProf){
            $this->nomeProf = $nomeProf;
        }        

        function setNomeAluno($nomeAluno){
                    $this->nomeAluno = $nomeAluno;
        }
        
        function setCpf($cpf){
            $this->cpf = $cpf;
        }

        function setMatricula($matricula){
            $this->matricula = $matricula;
        }

        function setTurma($turma){
            $this->turma = $turma;
        }        
        
        function setDisciplina($disciplina){
            $this->disciplina = $disciplina;
        }

        function setHora($hora){
            $this->hora = $hora;
        }

        function setOcorrencia($ocorrencia){
            $this->ocorrencia = $ocorrencia;
        }

/*------------------DEMAIS FUNÇÕES------------------------*/
        function insertOcorrencia($colecao){
            $query = array(
                'tipo' => 'ocorrencia',
                'nome_professor' => $this->nomeProf,
                'nome_aluno' => $this->nomeAluno,
                'cpf_aluno' => $this->cpf,
                'matricula_aluno' => $this->matricula,
                'turma' => $this->turma,
                'disciplina' => $this->disciplina,
                'hora' => date('d/m/Y  h:i:s'),
                'descricao_ocorrencia' => $this->ocorrencia); 
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }

        function deleteOcorrencia($colecao, $id){
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Ocorrência removida com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_ocorrencias.php">';   
        }

        function updateOcorrencia($colecao, $id){
            $query = $colecao->findone(array('_id' => $id));

            $query['nome_professor'] = $this->nomeProf;
            $query['nome_aluno'] = $this->nomeAluno;
            $query['cpf_aluno'] = $this->cpf;
			$query['matricula_aluno'] = $this->matricula;
			$query['turma'] = $this->turma;
			$query['disciplina'] = $this->disciplina;
			$query['descricao_ocorrencia'] = $this->descricao_ocorrencia;
			$query['hora'] = $query['hora'];
            $query['tipo'] = 'ocorrencia';
            $query['_id'] = $id;
            
            $colecao->save($query); //Atualiza o documento
            echo('Ocorrência alterada com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_ocorrencias.php">';   
        }

        //apresentação dos dados na tela
        function apresentaDados(){

            echo('
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Professor</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="nome_professor" value="'.$this->nomeProf.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Aluno</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="nome_aluno" value="'.$this->nomeAluno.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">CPF</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="cpf" value="'.$this->cpf.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Matrícula</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="matricula" value="'.$this->matricula.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Turma</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="turma" value="'.$this->turma.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Disciplina</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="disciplina" value="'.$this->disciplina.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Descrição da Ocorrência</div>
                    <div class="ui fluid icon input">
                        <input type="text" name="ocorrencia" value="'.$this->ocorrencia.'" readonly>
                    </div>
                </div>
            ');
        }

        function getOcorrencias() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'ocorrencia'); //filtra os dados com o tipo: curso
            $proje = array('nome_aluno' => 1, 'descricao_ocorrencia'=>1, 'hora' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta

            foreach ($cursor as $campo) {
                echo'

                    <tr>
                        <td  class="collapsing">
                            <div class="ui small basic icon buttons">
                                <a href="http://localhost/web1/projeto/template/update_ocorrencia.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button"><i class="edit icon"></i></button>
                                </a>
                                
                                <a href="http://localhost/web1/projeto/template/delete_ocorrencia.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button">
                                        <i class="trash outline icon"></i></button>                                            
                                </a>
                            </div>
                        </td>
                        <td>'.$campo['hora'].'</td>
                        <td>'.$campo['nome_aluno'].'</td>
                        <td>'.$campo['descricao_ocorrencia'].'</td>
                    </tr>';
            }
        }

        function getOcorrenciasAluno($aluno) {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'ocorrencia', 'nome_aluno' => $aluno); //filtra os dados com o tipo: curso
            $proje = array('nome_aluno' => 1, 'descricao_ocorrencia'=>1, 'hora' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta
            
            foreach ($cursor as $campo) {
                echo'

                    <tr>
                        <td  class="collapsing">
                            <div class="ui small basic icon buttons">
                                <a href="http://localhost/web1/projeto/template/detalhes_ocorrencia.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button">Detalhes</button>
                                </a>
                            </div>
                        </td>
                        <td>'.$campo['hora'].'</td>
                        <!--<td>'.$campo['nome_aluno'].'</td>-->
                        <td>'.$campo['descricao_ocorrencia'].'</td>
                    </tr>';
            }
            
        }
        
    }
?>
