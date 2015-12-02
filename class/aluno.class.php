<?php
class aluno{
    
/*------------------VAR------------------------*/
	private $nome;
	private $email;
    private $senha;
    private $data_nascimento;
	private $data_matricula;
	private $matricula;
	private $turma;
    
    
/*------------------GET------------------------*/
	function getNome(){
		return $this->nome;	
	}
	function getEmail(){
		return $this->email;	
	}
	function getDataNascimento(){
		return $this->data_nascimento;	
	}
	function getDataMatricula(){
		return $this->data_matricula;	
	}    
    function getMatricula(){
        return $this->matricula;
    }    
    function getTurma(){
        return $this->turma;
    }
    function getSenha(){
		return $this->senha;	
	}
	
/*------------------SET------------------------*/
	function setNome($nome){
		return $this->nome = $nome;	
	}    
	function setEmail($email){
		return $this->email = $email;	
	}
	function setDataNascimento($data_nascimento){
		return $this->data_nascimento = $data_nascimento;	
	}
	function setDataMatricula($data_matricula){
		return $this->data_matricula = $data_matricula;	
	}
    function setMatricula($matricula){
        return $this->matricula = $matricula;
    }
    function setTurma($turma){
        return $this->turma = $turma;
    }
    function setSenha($senha){
        return $this->senha = $senha;
    }

/*------------------DEMAIS FUNÇÕES------------------------*/
        function insertAluno(){
            include 'mongo/conexao.php';

            $senha=  password_hash($this->senha, PASSWORD_BCRYPT);
            $query = array(
                'tipo' => 'aluno',
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $senha,
                'data_nascimento' => $this->data_nascimento,
                'data_matricula' => $this->data_matricula,
                'matricula' => $this->matricula,
                'turma' => $this->turma);
            $colecao->insert($query);
            echo('Dados gravados com sucesso');
            
            /*$filtro = ['nome' => ['$exists' => true], 'email' => $this->email];
            $projecao = ['email' => 1, '_id' => 0];
            $cursor = $colecao->findOne($filtro, $projecao);
            
            if($this->email == $cursor['email']){
                echo('
                        <div class="ui red message">E-mail já cadastrado!</div>
                    ');
            }  elseif($this->email !== $cursor['email']) {            
                $senha=  password_hash($this->pwdP, PASSWORD_BCRYPT);
                $query = array(
                'tipo' => 'aluno',
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $senha,
                'data_nascimento' => $this->data_nascimento,
                'data_matricula' => $this->data_matricula,
                'matricula' => $this->matricula,
                'turma' => $this->turma);
                $colecao->insert($query);
                echo('Dados inseridos com sucesso!');
            }*/
        }

        function updateAluno(){
            include 'mongo/conexao.php';
            
            $filtro = ['tipo' => 'aluno','nome'=>$this->nome,'email'=>$this->email];
            $update = ['$set'=> ['data_nascimento'=>$this->data_nascimento,'data_matricula'=>$this->data_matricula,'matricula'=>$this->matricula,'turma'=>$this->turma]];
            $query = [$filtro, $update];
            $colecao->update($query);
            echo('Dados alterados com sucesso!');
            
        }

        function listaAlunos() {
            include 'mongo/conexao.php'; //insere o arquivo de conexão
            //include_once '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'aluno'); //filtra os dados com o tipo: curso
            $proje = array('nome' => 1, 'email'=>1,'data_nascimento'=>1,'data_matricula'=>1,'matricula'=>1,'turma'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            echo('<table class="ui fixed table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</td>
                            <th>Data de Nascimento</th>
                            <th>Data de Matrícula</th>
                            <th>Matrícula</th>
                            <th>Turma</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                ');    
            foreach ($cursor as $campo) {
                echo('        
                
                    <tr>
                        <td>'.$campo['nome'].'</td>
                        <td>'.$campo['email'].'</td>
                        <td>'.$campo['data_nascimento'].'</td>
                        <td>'.$campo['data_matricula'].'</td>
                        <td>'.$campo['matricula'].'</td>
                        <td>'.$campo['turma'].'</td>
                    </tr>');
            }
            echo ('
                </tbody>
                </table>');        
        }

        //apresentação dos dados na tela
        function apresentaDados(){
            echo('
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Nome</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="nome" value="'.$this->nome.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">E-mail</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="email" value="'.$this->email.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Data de Nascimento</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="data_nascimento" value="'.$this->data_nascimento.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Data de Matrícula</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="data_matricula" value="'.$this->data_matricula.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Turma</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="turma" value="'.$this->turma.'" readonly>
                    </div>
                </div>
            ');
        }
	}
?>
