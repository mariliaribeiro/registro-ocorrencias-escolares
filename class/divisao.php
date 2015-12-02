<?php
class divisao {

/*------------------VAR------------------------*/
    private $user;
    private $inclusao;
    private $local;

/*------------------GET------------------------*/
    function getLocal() {
        return $this->local;
    }

    function setLocal($local) {
        $this->local = $local;
    }

    function getUser() {
        return $this->user;
    }

    function getInclusao() {
        return $this->inclusao;
    }
    
/*------------------SET------------------------*/
    function setUser($user) {
        $this->user = $user;
    }

    function setInclusao($inclusao) {
        $this->inclusao = $inclusao;
    }

/*------------------DEMAIS FUNÇÕES------------------------*/
    function divideLayout() {
        if($this->inclusao!=null){
        switch ($this->user):
            case 'professor':
                switch ($this->local):
                    case 'esq':
                        echo '<article class="col-lg-8 col-xs-12 panel panel-default" >'; include $this->inclusao; echo '</article>';
                    break;
                    case 'centro':
                        echo '<article class="col-lg-2 col-xs-12 panel panel-default" >'; include $this->inclusao; echo '</article>';
                    break;
                    case 'dir':
                        echo '<article class="col-lg-2 col-xs-12 panel panel-default" >'; include $this->inclusao; echo '</article>';
                    break;
                endswitch;
            break;
            case 'aluno':
                echo '<article class="col-lg-8 col-xs-12 panel panel-default" > '; include $this->inclusao; echo '</article>';
                echo '<article class="col-lg-4 col-xs-12 panel panel-default" > '; include $this->inclusao; echo '</article>';
                break;
            default:
                echo '<article class="col-lg-8 col-xs-12 panel panel-default" > '; include $this->inclusao; echo '</article>';
        endswitch;}
    }
    
    
}
