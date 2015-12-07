<?php
class curso{

/*------------------VAR------------------------*/
	private $nome_curso;
	private $oferta;
	private $descricao;

/*------------------GET------------------------*/
	function getNomeCurso(){
		return $this->nome_curso;
	}
	function getOferta(){
		return $this->oferta;
	}
	function getDescricao(){
		return $this->descricao;
	}

/*------------------SET------------------------*/
	function setNomeCurso($nome_curso){
		return $this->nome_curso = $nome_curso;
	}
	function setOferta($oferta){
		return $this->oferta = $oferta;
	}
	function setDescricao($descricao){
		return $this->descricao = $descricao;
	}

/*------------------DEMAIS FUNÇÕES------------------------*/
        function insertCurso($colecao){
            $query = array(
                'tipo' => 'curso',
                'nome_curso' => $this->nome_curso,
                'oferta' => $this->oferta,
                'descricao' => $this->descricao);
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }

        function deleteCurso($colecao, $id){
            $colecao->remove(array('_id' => new MongoId($id)));
            echo('Curso removido com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_cursos.php">';   
        }

        function updateCurso($colecao, $id){
            $query = $colecao->findone(array('_id' => $id));

            $query['nome_curso'] = $this->nome_curso;
            $query['oferta'] = $this->oferta;
			$query['descricao'] = $this->descricao;
            $query['tipo'] = 'curso';
            $query['_id'] = $id;
            
            $colecao->save($query); //Atualiza o documento
            echo('Curso alterado com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/lista_cursos.php">';   
        }

        function getCursos() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'curso'); //filtra os dados com o tipo: curso
            $proje = array('nome_curso' => 1, 'oferta'=>1,'descricao'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta

            foreach ($cursor as $campo) {
                echo'

                    <tr>
                        <td  class="collapsing">
                            <div class="ui small basic icon buttons">
                                <a href="http://localhost/web1/projeto/template/update_curso.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button"><i class="edit icon"></i></button>
                                </a>
                                
                                <a href="http://localhost/web1/projeto/template/delete_curso.php?id='.$campo['_id'].'">
                                    <button class="ui button" type="button">
                                        <i class="trash outline icon"></i></button>                                            
                                </a>
                            </div>
                        </td>
                        <td>'.$campo['nome_curso'].'</td>
                        <td>'.$campo['descricao'].'</td>
                    </tr>';
            }
        }

        function selectCurso(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'curso'); //filtra os dados com o tipo: curso
            $proje = array('_id' => 1, 'nome_curso' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta
            foreach ($cursor as $campo) {
                echo('
                        <option value="'.$campo['nome_curso'].'">'.$campo['nome_curso'].'</option>
                    ');
            }
        }

        function selectPeriodoOferta(){
            for ($i = 1; $i <= 10; $i++) {
                echo('<option value="'.$i.'">'.$i.'</option>');
            }
        }

        function selectOferta(){
            echo('
                    <option value="Anual">Anual</option>
                    <option value="Semestral">Semestral</option>
                ');
        }
	}
?>
