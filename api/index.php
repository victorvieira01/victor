<?php 

require('config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){

    $sql = $pdo->query("SELECT * FROM series");
    if($sql->rowCount() > 0){
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
      

        foreach($data as $item) {
            $array['result'][] = [
                'id' => $item['id'],
                'serie' => $item['serie'],
                'ano' => $item['ano'],
                'numero_temporadas' => $item['numero_temporadas'],
                'categoria' => $item['categoria'],
                'sinopse' => $item['sinopse']
            ];
        }
    }


} else { 
    $array['error'] = 'Método não permitido( Apenas GET)';
}
 
require('return.php');