<?php


class Cotacao
{
    private $dados;

    public function __construct($moeda)
    {
        $api = "https://economia.awesomeapi.com.br/last/$moeda";
        $obj_json = json_decode(file_get_contents($api));
        $this->dados = $obj_json;

        $this->dados = $this->dados->{str_replace("-", "", $moeda)};
    }

    public function retorno()
    {
        return $this->dados;
    }
}