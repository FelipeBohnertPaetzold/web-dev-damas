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
    $tabuleiro = getTabuleiro();
    if(!isset($tabuleiro[$origem[0]][$origem[1]])) {
        echo "\n Origem invalida!";
        return false;
    }
    if(!isset($tabuleiro[$destino[0]][$destino[1]])) {
        echo "\n Destino invalido!";
        return false;
    }
    
    return true;
}

function posicao_vazia($origem, $destino)
{
    if (!posicao_existente($origem, $destino)) {
        return false;
    }
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
    if ($origem[1] % 2 == 0) {
        if ($destino[1] % 2 == 0) {
            echo "\n Destino invalido";
            return false;
        }
    } else {
        if ($destino[1] % 2 != 0) {
            echo "\n Destino invalido";
            return false;
        }
    }
    return true;
}

function movimentacao_diagonal_frente($origem, $destino)
{
    $tabuleiro = getTabuleiro();
    $distancia_linha = $destino[0] - $origem[0];
    $distancia_coluna = $destino[1] - $origem[1];
    if($distancia_coluna != 1 && $distancia_coluna != -1) {
        echo "\n Distancia coluna invalida";
        return false;
    }
    if ($tabuleiro[$origem[0]][$origem[1]] == 'B') {
        if($distancia_linha != 1) {
            echo '\n Tentou voltar a branca';
            return false;
        }
    } else {
        if($distancia_linha != -1) {
            echo '\n Tentou voltar a preta';
            return false;
        }
    }
    return true;
}