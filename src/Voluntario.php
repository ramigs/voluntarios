<?php

class Voluntario
{

    public $id;
    public $nome;
    public $apelido;

/*     public function __construct()
    {
        
    } */

    public function info()
    {
        return '#'.$this->id.': '.$this->nome.' '.$this->apelido;
    }

}

?>