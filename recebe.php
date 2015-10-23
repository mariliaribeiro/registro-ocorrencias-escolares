<!DOCTYPE html>
<html>
    <head>
        <title>Recebe Dados do Formulário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="js/meu-arquivo.js"></script>
    </head>
    
    <body>
        <?php               
            include = 'form.class.php';
            $formulario= new form;
            /*$formulario->setNomeProf(filter_input(\INPUT_GET, 'nome_professor'));
            $formulario->setNomeAluno(filter_input(\INPUT_GET, 'nome_aluno'));
            $formulario->setCpf(filter_input(\INPUT_GET, 'cpf_aluno'));
            $formulario->setMatricula(filter_input(\INPUT_GET, 'matricula'));            
            $formulario->setTurma(filter_input(\INPUT_GET, 'turma'));
            $formulario->setDisciplina(filter_input(\INPUT_GET, 'disciplina'));
            //$formulario->setHora(filter_input(\INPUT_POST, 'hora'));
            $formulario->setOcorrencia(filter_input(\INPUT_GET, 'ocorrencia'));*/
               
            $formulario->setNomeProf(filter_input(\INPUT_POST, 'nome_professor'));
            $formulario->setNomeAluno(filter_input(\INPUT_POST, 'nome_aluno'));
            $formulario->setCpf(filter_input(\INPUT_POST, 'cpf_aluno'));
            $formulario->setMatricula(filter_input(\INPUT_POST, 'matricula'));            
            $formulario->setTurma(filter_input(\INPUT_POST, 'turma'));
            $formulario->setDisciplina(filter_input(\INPUT_POST, 'disciplina'));
            //$formulario->setHora(filter_input(\INPUT_POST, 'hora'));
            $formulario->setOcorrencia(filter_input(\INPUT_POST, 'ocorrencia'));       
                        
            $formulario->ApresentaDados();
        ?>
        
    </body>
</html>
