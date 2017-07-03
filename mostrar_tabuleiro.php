<?php


if(!file_exists('tabuleiro.json')) {
    require_once './monta_array.php';
}

$tabuleiro = json_decode(file_get_contents('tabuleiro.json'));

//var_dump($tabuleiro);
echo '<table style="margin: auto; border: 2px solid black" >';
for($l = 0; $l < 8; $l++) {
    echo '<tr>';
    for($c = 0; $c < 8; $c++) {
        $class = '';
        if($l % 2 == 0 && $c % 2 != 0) {
            $class = 'background-color: #000; color: #fff; font-weight: bold;';
        } else {
           if($l % 2 != 0 && $c % 2 == 0) {
              $class = 'background-color: #000; color: #fff; font-weight: bold;';
           }   
        }
        echo "<td height='70' style='width: 20px; border: 2px solid black; padding: 25px; ". $class ."'>";
            echo $tabuleiro[$l][$c];
        echo "</td>";
    }
    echo "</tr>\n";
}
echo '</table>';
