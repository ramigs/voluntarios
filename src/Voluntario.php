<?php

class Voluntario
{

    /* public $id;
    public $nome;
    public $apelido;
    public $data_nascimento;
    public $tipo_contato;
    public $email1;
    public $email2;
    public $telefone;
    public $genero;
    public $nif;
    public $localidade;
    public $codigo_postal;
    public $consente_promocoes;
    public $consente_campanhas;
    public $tipo_registo;
    public $data_registo;
    public $tipo_remocao; */

/*     public function __construct()
    {
        
    } */

    public function info()
    {
        return '#'.$this->id.': '.$this->nome.' '.$this->apelido;
    }

}

?>