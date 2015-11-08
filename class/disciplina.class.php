<?php
class aluno{
    
/*------------------VAR------------------------*/
	private $nome;
	private $email;
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

/*------------------DEMAIS FUNÇÕES------------------------*/      
        function listaAlunos() {
        include 'conexao.php'; //insere o arquivo de conexão
        $filter = array('tipo'=>'aluno'); //filtra os dados com o tipo: curso
        $proje = array('nome' => 1, 'email'=>1,'data_nascimento'=>1,'data_matricula'=>1,'matricula'=>1,'turma'=>1);//apresenta os dados desejados
        $cursor = $colecao->find($filter,$proje);//executa a consulta    
        
        echo'<table class="tabela1">
            <thead>
				<tr><th colspan="4">Lista Alunos</th></tr>
            </thead>
            <tfoot>
				<tr><td colspan="4">Base exemplo</td></tr>
			</tfoot>
			<tbody>
			<tr>
					<td>Nome</td>
					<td>E-mail</td>
					<td>Data de Nascimento</td>
					<td>Data de Matrícula</td>
					<td>Matrícula</td>
					<td>Turma</td>
				</tr>';    
        foreach ($cursor as $campo) {
            echo'        
            
				<tr>
					<td>'.$campo['nome'].'</td>
					<td>'.$campo['email'].'</td>
					<td>'.$campo['data_nascimento'].'</td>
					<td>'.$campo['data_matricula'].'</td>
					<td>'.$campo['matricula'].'</td>
					<td>'.$campo['turma'].'</td>
				</tr>';
        }
        echo '
			</tbody>
			</table>';        
    }
	
	
	}
?>
