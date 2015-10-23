<?php
    class form{
        private $nomeProf; 
        private $nomeAluno;
        private $cpf;
        private $matricula;
        private $turma;
        private $disciplina;
        //private $hora;
        private $ocorrencia;

        //get
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
        
        //set
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


        //apresentaçaõ dos dados na tela
        function ApresentaDados(){
            echo('Bom dia senhor: '.$this->nomeProf.
                 '<br> e o nome do aluno: '.$this->nomeAluno.
                 '<br> com o CPF: '.$this->cpf.
                 '<br> a matrícula do aluno é: '.$this->matricula.
                 '<br> para turma: '.$this->turma.
                 '<br> disciplina: '.$this->disciplina.
                 '<br> ocorrência: '.$this->ocorrencia); 
        }
        
    }
?>
