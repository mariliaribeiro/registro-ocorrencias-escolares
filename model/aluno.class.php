<?php
class aluno{
    
/*------------------VAR------------------------*/
	private $nome;
	private $cpf;
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
	function getCpf(){
		return $this->cpf;	
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
	function setCpf($cpf){
		return $this->cpf = $cpf;	
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
            $senha =  password_hash($this->senha, PASSWORD_BCRYPT);
            $query = array(
                'tipo' => 'aluno',
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'email' => $this->email,
                'senha' => $senha,
                'data_nascimento' => $this->data_nascimento,
                'matricula' => $this->matricula,
                'data_matricula' => date('d/m/Y h:i:s'),
                'turma' => $this->turma);
                $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }

        function deleteAluno($colecao, $id){
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Aluno removido com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_alunos.php">';   
        }

        function updateAluno($colecao, $id){
            $query = $colecao->findone(array('_id' => $id));

            $query['nome'] = $this->nome;
			$query['email'] = $this->email;
			$query['cpf'] = $this->cpf;
			$query['senha'] = $this->senha;
            $query['data_nascimento'] = $this->data_nascimento;
            $query['matricula'] = $this->matricula;
			$query['data_matricula'] = $query['data_matricula'];
			$query['turma'] = $this->turma;
            $query['tipo'] = 'aluno';
            $query['_id'] = $id;
            
            $colecao->save($query); //Atualiza o documento
            echo('Aluno alterado com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_alunos.php">';   
        }

        function getAlunos() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'aluno'); //filtra os dados com o tipo: curso
            $proje = array('nome' => 1, 'email'=>1,'turma'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta

            foreach ($cursor as $campo) {
                echo'
                    <tr>
                        <td  class="collapsing">
                            <div class="ui small basic icon buttons">
                                <a href="http://localhost/web1/projeto/template/update_aluno.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button"><i class="edit icon"></i></button>
                                </a>
                                
                                <a href="http://localhost/web1/projeto/template/delete_aluno.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button">
                                        <i class="trash outline icon"></i></button>                                            
                                </a>
                            </div>
                        </td>
                        <td>'.$campo['nome'].'</td>
                        <td>'.$campo['email'].'</td>
                        <td>'.$campo['turma'].'</td>
                    </tr>';
            }
        }

        function getPerfil($email){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $query = $colecao->findone(array('email' => $email));
        
            echo('
               <div class="field">
                    <label>Nome</label>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="nome" placeholder="Nome" value="'.$query['nome'].'" readonly>
                    </div>
                </div>                                                               
               
                <div class="field">
                    <label>CPF</label>
                    <div class="ui fluid icon input">                         
                        <input type="text" value="'.$query['cpf'].'" name="cpf" placeholder="xxx.xxx.xxx-xx" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);" readonly>
                    </div>
                </div>

                <div class="field">
                    <label>E-mail</label>
                    <div class="ui left icon input">
                        <input type="text" name="email" placeholder="E-mail" value="'.$query['email'].'" readonly>
                        <i class="mail icon"></i>
                    </div>
                </div>

                <div class="field">
                    <label>Matrícula</label>
                    <div class="ui fluid icon input">
                      <input type="text" name="matricula" placeholder="Matrícula" value="'.$query['matricula'].'" readonly>
                    </div>
                </div>
            ');
        }

        function selectAlunos(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'aluno'); //filtra os dados com o tipo: curso
            $proje = array('nome' => 1, 'email'=>1,'turma'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta

            foreach ($cursor as $campo) {
                echo(' <option value="'.$campo['nome'].'">'.$campo['nome'].'</option>');
            }
        }
	}
?>
