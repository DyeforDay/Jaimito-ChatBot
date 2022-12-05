<?php

class Bot
{
    private string $nome = 'Jaimito ChatBot';

    public function getNome(): string
    {
        return $this->nome;
    }

    private function mostraAjuda($dados): ?string
    {
        $retorno = null;
        foreach ($dados as $chave => $valor) {
            if ($chave != 'ajuda') {
                $retorno .= $chave . PHP_EOL;
            }
        }
        return $retorno;
    }

    public function hears($message, callable $call)
    {
        $call(new Bot());
        return $message;
    }

    public function reply($response)
    {
        print($response . '<br>');
    }

    public function procurarPergunta($valor, $listaPerguntasRespostas)
    {
        $valor = trim($valor);
        foreach ($listaPerguntasRespostas as $pergunta => $resposta){
            if ($valor == $pergunta){
                if(gettype($resposta) == 'array'){
                    return $this->mostraAjuda($listaPerguntasRespostas) .
                        $this->mostraAjuda($resposta);
                }else{
                    return $resposta;
                }
            }
        }
    }
} 