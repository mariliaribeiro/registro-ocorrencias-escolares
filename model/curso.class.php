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
        function insertCurso(){
            include '../mongo/conexao.php';

            $query = array(
                        'tipo' => 'curso',
                        'nome_curso' => $this->nome_curso,
                        'oferta' => $this->oferta,
                        'descricao' => $this->descricao);
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
            /*$filtro = ['nome_curso' => $this->curso];
            $projecao = ['nome_curso' => 1, '_id' => 0];
            $cursor = $colecao->findOne($filtro, $projecao);
            
            if($this->nome_curso == $cursor['nome_curso']){
                echo('
                        <div class="ui red message">Curso já cadastrado!</div>
                    ');
            }  elseif($this->curso !== $cursor['nome_curso']) {  
                $query = array(
                        'tipo' => 'curso',
                        'nome_curso' => $this->nome_curso,
                        'oferta' => $this->oferta,
                        'descricao' => $this->descricao);
                $colecao->insert($query);
                echo('Dados inseridos com sucesso!');
            }*/
        }

        function updateCurso(){
            include '../mongo/conexao.php';
            
            $filtro = ['tipo' => 'curso','nome_curso'=>$this->nome_curso];
            $update = ['$set'=> ['oferta'=>$this->oferta,'descricao'=>$this->descricao]];
            $query = [$filtro, $update];
            $colecao->update($query);
            echo('Dados alterados com sucesso!');
        }
        
        function getCursos() {
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'curso'); //filtra os dados com o tipo: curso
            $proje = array('nome_curso' => 1, 'oferta'=>1,'descricao'=>1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            foreach ($cursor as $campo) {
                echo'        
                
                    <tr>
                        <td>'.$campo['nome_curso'].'</td>
                        <td>'.$campo['oferta'].'</td>
                        <td>'.$campo['descricao'].'</td>
                    </tr>';
            }
        }
	
        //apresentação dos dados na tela
        function apresentaDados(){
            echo('
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Curso</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="curso" value="'.$this->nome_curso.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Oferta</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="oferta" value="'.$this->oferta.'" readonly>
                    </div>
                </div>
                
                <div class="field" style="padding: 0px 0px 10px 0px;">
                    <div class="ui label">Descrição</div>
                    <div class="ui fluid icon input">                            
                        <input type="text" name="descricao" value="'.$this->descricao.'" readonly>
                    </div>
                </div>
            ');
        }

        function selectCurso(){
            include '../mongo/conexao.php'; //insere o arquivo de conexão
            $filter = array('tipo'=>'curso'); //filtra os dados com o tipo: curso
            $proje = array('_id' => 1, 'nome_curso' => 1);//apresenta os dados desejados
            $cursor = $colecao->find($filter,$proje);//executa a consulta    
            
            echo('
                    <select name="curso" id="select_curso" required>
                        <option>Selecione um curso</option>'
                );

            foreach ($cursor as $campo) {
                echo('
                        <option value="'.$campo['_id'].'">'.$campo['nome_curso'].'</option>
                    ');
            }
            
            echo('</select>');
        }

        function selectPeriodoOferta(){
            echo('
                    <select name="periodo_oferta" id="select_perido_oferta" required>
                        <option>Selecione um período</option>'
                );                 
            for ($i = 1; $i <= 10; $i++) {
                echo('<option>'.$i.'</option>');
            }
            echo('</select>');
        }
        
        function selectOferta(){
            echo('
                    <select name="oferta">
                        <option>Anual</option>
                        <option>Semestral</option>
                    </select>
                ');
        }
	}
?>
