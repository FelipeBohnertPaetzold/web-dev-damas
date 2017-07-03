<?php

function getValidacoes()
{
    return [
        'posicao_existente',
        'posicao_vazia',
        'posicao_valida',
        'movimentacao_diagonal_frente'
    ];
}

function getTabuleiro() {
    return json_decode(file_get_contents('tabuleiro.json', true));
}

function validar_movimentacao($origem, $destino)
{
    foreach(getValidacoes() as $funcao) {
        if(!$funcao($origem, $destino)) {
            return false;
        }
    }
    return true;
}

function posicao_existente($origem, $destino)
{
    if($origem[0] > 7 || $origem[1] > 7 || $destino[0] > 7 || $destino[1] > 7) {
        echo "\n Posicao inexistente!";
        return false;
    }
    return true;
}

function posicao_vazia($origem, $destino)
{
    $tabuleiro = getTabuleiro();
    if(!$tabuleiro[$origem[0]][$origem[1]]) {
        echo "\n Origem vazia!";
        return false;
    }
    if($tabuleiro[$destino[0]][$destino[1]]) {
        echo  "\n Destino já ocupado!";
        return false;
    }
    return true;
}

function posicao_valida($origem, $destino)
{
    return true;
}

function movimentacao_diagonal_frente($origem, $destino)
{
    return true;
}