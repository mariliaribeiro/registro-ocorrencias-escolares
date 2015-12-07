<?php
class disciplina{
    
/*------------------VAR------------------------*/
	private $nome_disciplina;
	private $descricao;
	private $periodo_oferta;
	private $curso_oferta;
    
/*------------------GET------------------------*/
	function getNomeDisciplina(){
		return $this->nome_disciplina;	
	}
	function getDescricao(){
		return $this->descricao;	
	}
	function getPeriodoOferta(){
		return $this->periodo_oferta;	
	}
	function getCursoOferta(){
		return $this->curso_oferta;	
	}    
        
/*------------------SET------------------------*/
	function setNomeDisciplina($nome_disciplina){
		return $this->nome_disciplina = $nome_disciplina;	
	}    
	function setDescricao($descricao){
		return $this->descricao = $descricao;	
	}
	function setPeriodoOferta($periodo_oferta){
		return $this->periodo_oferta = $periodo_oferta;	
	}
	function setCursoOferta($curso_oferta){
		return $this->curso_oferta = $curso_oferta;	
	}
    
/*------------------DEMAIS FUNÇÕES------------------------*/
        function insertDisciplina($colecao){
            $query = array(
                'tipo' => 'disciplina',
                'nome_disciplina' => $this->nome_disciplina,
                'descricao' => $this->descricao,
                'periodo_oferta' => $this->periodo_oferta,
                'curso_oferta' => $this->curso_oferta); 
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }

        function deleteDisciplina($colecao, $id){
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Disciplina removido com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_disciplinas.php">';   
        }

        function updateDisciplina($colecao, $id){
            $query = $colecao->findone(array('_id' => $id));

            $query['nome_disciplina'] = $this->nome_disciplina;
            $query['descricao'] = $this->descricao;
			$query['periodo_oferta'] = $this->periodo_oferta;
			$query['curso_oferta'] = $this->curso_oferta;
            $query['tipo'] = 'disciplina';
            $query['_id'] = $id;
            
            $colecao->save($query); //Atualiza o documento
            echo('Disciplina alterado com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_disciplinas.php">';   
        }

        
        function getDisciplinas() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'disciplina'); //filtra os dados com o tipo: curso
            $proje = array('nome_disciplina' => 1, 'descricao'=>1,'periodo_oferta'=>1,'curso_oferta'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo('        
                    <tr>
                        <td  class="collapsing">
                            <div class="ui small basic icon buttons">
                                <a href="http://localhost/web1/projeto/template/update_disciplina.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button"><i class="edit icon"></i></button>
                                </a>
                                
                                <a href="http://localhost/web1/projeto/template/delete_disciplina.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button">
                                        <i class="trash outline icon"></i></button>                                            
                                </a>
                            </div>
                        </td>
                        <td>'.$campo['nome_disciplina'].'</td>
                        <td>'.$campo['descricao'].'</td>
                    </tr>');
            }
        }
	
        function selectDisciplina(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'disciplina'); //filtra os dados com o tipo: curso
            $proje = array('_id' => 1, 'nome_disciplina' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo('
                        <option value="'.$campo['nome_disciplina'].'">'.$campo['nome_disciplina'].'</option>
                    ');
            }
        }
	}
?>
