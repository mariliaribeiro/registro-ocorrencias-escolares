<?php
class professor{
    
/*------------------VAR------------------------*/
	private $nome;
    private $cpf;
    private $email;
    private $matricula;
    private $senha;
    
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
	function getMatricula(){
		return $this->matricula;	
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
	function setMatricula($matricula){
		return $this->matricula = $matricula;	
	}
	function setSenha($senha){
		return $this->senha = $senha;	
	}

/*------------------DEMAIS FUNÇÕES------------------------*/
        function insertProfessor($colecao){
            $senha=  password_hash($this->senha, PASSWORD_BCRYPT);
            $query = array(
                'tipo' => 'professor',
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'email' => $this->email,
                'matricula' => $this->matricula,
                'senha' => $senha);
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }

        function deleteProfessor($colecao, $id){
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Professor removido com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_professores.php">';   
        }

        function updateProfessor($colecao, $id){
            $query = $colecao->findone(array('_id' => $id));

            $query['nome'] = $this->nome;
            $query['cpf'] = $this->cpf;
			$query['email'] = $this->email;
			$query['senha'] = $this->senha;
			$query['matricula'] = $this->matricula;
            $query['tipo'] = 'professor';
            $query['_id'] = $id;
            
            $colecao->save($query); //Atualiza o documento
            echo('Professor alterado com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_professores.php">';   
        }

        function getProfessores() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'professor'); //filtra os dados com o tipo: curso
            $proje = array('nome' => 1, 'email'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta

            foreach ($cursor as $campo) {
                echo'

                    <tr>
                        <td  class="collapsing">
                            <div class="ui small basic icon buttons">
                                <a href="http://localhost/web1/projeto/template/update_professor.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button"><i class="edit icon"></i></button>
                                </a>
                                
                                <a href="http://localhost/web1/projeto/template/delete_professor.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button">
                                        <i class="trash outline icon"></i></button>                                            
                                </a>
                            </div>
                        </td>
                        <td>'.$campo['nome'].'</td>
                        <td>'.$campo['email'].'</td>
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
	}
?>
