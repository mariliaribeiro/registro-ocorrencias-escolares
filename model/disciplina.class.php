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
         function insertCurso(){
            include '../mongo/conexao.php';

            $query = array(
                        'tipo' => 'disciplina',
                        'nome_disciplina' => $this->nome_disciplina,
                        'descricao' => $this->descricao,
                        'periodo_oferta' => $this->periodo_oferta
                        'curso_oferta' => $this->curso_oferta); 
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
            /*$filtro = ['nome_disciplina' => $this->nome_disciplina];
            $projecao = ['nome_disciplina' => 1, '_id' => 0];
            $cursor = $colecao->findOne($filtro, $projecao);
            
            if($this->nome_disciplina == $cursor['nome_disciplina']){
                echo('
                        <div class="ui red message">Disciplina já cadastrada!</div>
                    ');
            }  elseif($this->nome_disciplina !== $cursor['nome_disciplina']) {  
                $query = array(
                        'tipo' => 'disciplina',
                        'nome_disciplina' => $this->nome_disciplina,
                        'descricao' => $this->descricao,
                        'periodo_oferta' => $this->periodo_oferta
                        'curso_oferta' => $this->curso_oferta); 
                $colecao->insert($query);
                echo('Dados inseridos com sucesso!');
            }*/
        }

        function updateDisciplinas(){
            include '../mongo/conexao.php';
            
            $filtro = ['tipo' => 'disciplina','nome_disciplina'=>$this->nome_disciplina];
            $update = ['$set'=> ['descricao'=>$this->descricao,'periodo_oferta'=>$this->periodo_oferta,'curso_oferta'=>$this->curso_oferta]];
            $query = [$filtro, $update];
            $colecao->update($query);
            echo('Dados alterados com sucesso!');
            
        }
        
        function getDisciplinas() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'disciplina'); //filtra os dados com o tipo: curso
            $proje = array('nome_disciplina' => 1, 'descricao'=>1,'periodo_oferta'=>1,'curso_oferta'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo('        
                    <tr>
                        <td>'.$campo['nome_disciplina'].'</td>
                        <td>'.$campo['descricao'].'</td>
                        <td>'.$campo['periodo_oferta'].'</td>
                        <td>'.$campo['curso_oferta'].'</td>
                    </tr>');
            }
        }
	
        //apresentação dos dados na tela
        function apresentaDados(){
            echo('
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Disciplina</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="nome_disciplina" value="'.$this->nome_disciplina.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Descrição</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="descricao" value="'.$this->descricao.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Período de Oferta</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="periodo_oferta" value="'.$this->periodo_oferta.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Curso</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="curso_oferta" value="'.$this->curso_oferta.'" readonly>
                    </div>
                </div>
            ');
        }

        function selectDisciplina(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'disciplina'); //filtra os dados com o tipo: curso
            $proje = array('_id' => 1, 'nome_disciplina' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            echo('
                    <select name="disciplina" id="select_disciplina" required>
                        <option>Selecione uma disciplina</option>'
                );

            foreach ($cursor as $campo) {
                echo('
                        <option value="'.$campo['_id'].'">'.$campo['nome_disciplina'].'</option>
                    ');
            }
            
            echo('
                    </select>
                ');
        }
	}
?>
