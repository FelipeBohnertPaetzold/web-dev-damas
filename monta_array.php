<?php

$tabuleiro = [];

echo 'Gerou file';

for($l = 0; $l < 8; $l++) {
    if($l <= 2) {
        if($l % 2 == 0) {
            $tabuleiro[$l] = ['', 'B', '', 'B', '', 'B', '', 'B'];
        } else {
            $tabuleiro[$l] = ['B', '', 'B', '', 'B', '', 'B', ''];
        }
    } else if($l >= 5) {
        if($l % 2 == 0) {
            $tabuleiro[$l] = ['', 'P', '', 'P', '', 'P', '', 'P'];
        } else {
            $tabuleiro[$l] = ['P', '', 'P', '', 'P', '', 'P', ''];
        }
    } else {
        $tabuleiro[$l] = ['', '', '', '', '', '', '', ''];
    }
}

file_put_contents('tabuleiro.json', json_encode($tabuleiro));