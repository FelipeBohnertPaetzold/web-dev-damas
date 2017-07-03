<?php

    require_once './validacao.php';

    $origem = $_GET["origem"];
    $destino = $_GET["destino"];
    
    if(!file_exists('tabuleiro.json')) {
        echo "Erro";
        exit;
    }
    
    if(validar_movimentacao($origem, $destino)) {
        $tabuleiro = json_decode(file_get_contents('tabuleiro.json'));
        $tabuleiro[$destino[0]][$destino[1]] = $tabuleiro[$origem[0]][$origem[1]];
        $tabuleiro[$origem[0]][$origem[1]] = '';
    
        file_put_contents('tabuleiro.json', json_encode($tabuleiro));
    } else {
        echo 'Erro! Movimento incorreto';
    }
    