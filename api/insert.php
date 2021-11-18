<?php 

require('config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'post'){
   
    $serie = filter_input(INPUT_POST, 'serie');
    $ano = filter_input(INPUT_POST, 'ano');
    $numero_temporadas = filter_input(INPUT_POST, 'numero_temporadas');
    $categoria = filter_input(INPUT_POST, 'categoria');
    $sinopse = filter_input(INPUT_POST, 'sinopse');

    if($serie && $ano && $numero_temporadas && $categoria && $sinopse) {

        $sql = $pdo->prepare("INSERT INTO series(serie, ano, numero_temporadas, categoria, sinopse) VALUES (:serie, :ano, :numero_temporadas, :categoria, :sinopse)");
        $sql->bindValue(':serie', $serie);
        $sql->bindValue(':ano', $ano);
        $sql->bindValue(':numero_temporadas', $numero_temporadas);
        $sql->bindValue(':categoria', $categoria);
        $sql->bindValue(':sinopse', $sinopse);
        $sql->execute();

        $id = $pdo->lastInsertId();

        $array['result'] = [
            'id' => $id,
            'serie' => $serie,
            'ano' => $ano,
            'numero_temporadas' => $numero_temporadas,
            'categoria' => $categoria,
            'sinopse' => $sinopse
        ];
    
    } else {
        $array['error'] = 'Campos nao enviados';
    }
  
} else { 
    $array['error'] = 'Metodo nao permitido( Apenas POST)';
}
 
require('return.php');