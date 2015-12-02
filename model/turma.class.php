<?php
class turma{
    
/*------------------VAR------------------------*/
	private $turma;
	private $curso;
    
/*------------------GET------------------------*/
    function getTurma(){
		return $this->turma;	
	}
    
    function getNomeCurso(){
		return $this->nome_curso;	
	}	
/*------------------SET------------------------*/
    function setTurma($turma){
		return $this->turma = $turma;	
	}
    
    function setNomeCurso($nome_curso){
		return $this->nome_curso = $nome_curso;	
	}    

/*------------------DEMAIS FUNÇÕES------------------------*/
    function insertTurma(){

        $query = array(
                'tipo' => 'turma'
                'nome_turma' => $this->turma,
                'curso' => $this->curso);
        $colecao->insert($query);
        echo('Dados inseridos com sucesso!');
        echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';

            
        /*$filtro = ['turma' => $this->turma];
        $projecao = ['turma' => 1, '_id' => 0];
        $cursor = $colecao->findOne($filtro, $projecao);
        
        if($this->turma == $cursor['turma']){
            echo('
                    <div class="ui red message">Turma já cadastrado!</div>
                ');
        }  elseif($this->turma !== $cursor['turma']) {            
            $query = array(
                'tipo' => 'turma'
                'turma' => $this->turma,
                'curso' => $this->curso);
            $colecao->insert($query);
            echo('Dados inseridos com sucesso!');
        }*/
    }

    function updateAluno(){
        include '../mongo/conexao.php';
        
        $filtro = ['tipo' => 'turma','nome_turma'=>$this->turma];
        $update = ['$set'=> ['curso'=>$this->curso]];
        $query = [$filtro, $update];
        $colecao->update($query);
        echo('Dados alterados com sucesso!');
        
    }

    function getTurmas() {
        include '../mongo/conexao.php'; //insere o arquivo de conexão
        $filter = array('tipo'=>'turma'); //filtra os dados com o tipo: curso
        $proje = array('nome_turma' => 1, 'curso'=>1);//apresenta os dados desejados
        $cursor = $colecao->find($filter,$proje);//executa a consulta    
        
        foreach ($cursor as $campo) {
            echo('        
                    <tr>
                        <td>'.$campo['nome_turma'].'</td>
                        <td>'.$campo['curso'].'</td>
                    </tr>
                ');
        }
    }

    //apresentação dos dados na tela
    function apresentaDados(){
        echo('
            <div class="field" style="padding: 0px 0px 10px 0px;">
                <div class="ui label">Turma</div>
                <div class="ui fluid icon input">                            
                    <input type="text" name="turma" value="'.$this->turma.'" readonly>
                </div>
            </div>
            <div class="field" style="padding: 0px 0px 10px 0px;">
                <div class="ui label">Curso</div>
                <div class="ui fluid icon input">                            
                    <input type="text" name="curso" value="'.$this->curso.'" readonly>
                </div>
            </div>
        ');
    }

    function selectTurma(){
        include '../mongo/conexao.php'; //insere o arquivo de conexão
        $filter = array('tipo'=>'turma'); //filtra os dados com o tipo: curso
        $proje = array('_id' => 1, 'nome_turma' => 1);//apresenta os dados desejados
        $cursor = $colecao->find($filter,$proje);//executa a consulta    
        foreach ($cursor as $campo) {
            echo(' <option value="'.$campo['_id'].'">'.$campo['nome_turma'].'</option>');
        }
    }
}
?>
