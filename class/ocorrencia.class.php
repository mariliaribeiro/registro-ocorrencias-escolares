<?php
    class ocorrencia{

/*------------------VAR------------------------*/
        private $nomeProf; 
        private $nomeAluno;
        private $cpf;
        private $matricula;
        private $turma;
        private $disciplina;
        //private $hora;
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

        /*function getHora(){
            return $this->hora;
        }*/

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

        /*function setHora($hora){
            $this->hora = $hora;
        }*/

        function setOcorrencia($ocorrencia){
            $this->ocorrencia = $ocorrencia;
        }

/*------------------DEMAIS FUNÇÕES------------------------*/
        function insertCurso(){
            include 'mongo/conexao.php';
            $query = array(
                        'tipo' => 'ocorrencia',
                        'nome_professor' => $this->nomeProf,
                        'nome_aluno' => $this->nomeAluno,
                        'cpf_aluno' => $this->cpf
                        'matricula_aluno' => $this->matricula,
                        'turma' => $this->turma,
                        'disciplina' => $this->disciplina,
                        /*'hora' => $this->hora,*/
                        'descricao_ocorrencia' => $this->ocorrencia); 
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
        }

        function updateOcorrencia(){
            include 'mongo/conexao.php';
            
            $filtro = ['tipo' => 'ocorrencia','nome_professor'=>$this->nomeProf,'nome_aluno'=>$this->nomeAluno];
            $update = ['$set'=> ['turma'=>$this->turma,'disciplina'=>$this->disciplina,'descricao_ocorrencia'=>$this->ocorrencia]];
            $query = [$filtro, $update];
            $colecao->update($query);
            echo('Dados alterados com sucesso!');
            
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
        
    }
?>
