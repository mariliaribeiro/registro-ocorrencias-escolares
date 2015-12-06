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
        function insertAluno($colecao){
            $senha=  password_hash($this->senha, PASSWORD_BCRYPT);
            $query = array(
                'tipo' => 'aluno',
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $senha,
                'data_nascimento' => $this->data_nascimento,
                'data_matricula' => $this->data_matricula,
                'matricula' => $this->matricula,
                'data_matricula' => date('d/m/Y  h:i:s');
                'turma' => $this->turma);
            $colecao->insert($query);
            echo('Dados gravados com sucesso');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';

        function updateAluno(){
            include '../mongo/conexao.php';
            
            $filtro = ['tipo' => 'aluno','nome'=>$this->nome,'email'=>$this->email];
            $update = ['$set'=> ['data_nascimento'=>$this->data_nascimento,'data_matricula'=>$this->data_matricula,'matricula'=>$this->matricula,'turma'=>$this->turma]];
            $query = [$filtro, $update];
            $colecao->update($query);
            echo('Dados alterados com sucesso!');
            
        }

        function listaAlunos() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            //include_once '../../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'aluno'); //filtra os dados com o tipo: curso
            $proje = array('nome' => 1, 'email'=>1,'data_nascimento'=>1,'data_matricula'=>1,'matricula'=>1,'turma'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo('        
                
                    <tr>
                        <td>
                            <a href="http://localhost/web1/projeto/template/update_aluno.php"><i class="edit icon"></i></a>
                            <a href="http://localhost/web1/projeto/template/delete_aluno.php"><i class="trash outline icon"></i></a>
                        </td>
                        <td>'.$campo['nome'].'</td>
                        <td>'.$campo['email'].'</td>
                        <td>'.$campo['turma'].'</td>
                    </tr>');
            }
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

        function getPerfil(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $condicao = array("email" => $this->login);
            $busca = $colecao->findone($condicao);
        
            echo('
               <div class="field">
                    <label>Nome</label>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="nome" placeholder="Nome" value="'.$busca['nome'].'">
                    </div>
                </div>                                                               
               
                <div class="field">
                    <label>CPF</label>
                    <div class="ui fluid icon input">                         
                        <input type="text" value="'.$busca['cpf'].'" name="cpf" placeholder="xxx.xxx.xxx-xx" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);">
                    </div>
                </div>

                <div class="field">
                    <label>E-mail</label>
                    <div class="ui left icon input">
                        <input type="text" name="email" placeholder="E-mail" value="'.$busca['email'].'">
                        <i class="mail icon"></i>
                    </div>
                </div>

                <div class="field">
                    <label>Matrícula</label>
                    <div class="ui fluid icon input">
                      <input type="text" name="matricula" placeholder="Matrícula" value="'.$busca['matricula'].'">
                    </div>
                </div>
            ');
        }
	}
?>
