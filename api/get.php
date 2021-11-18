<?php 

require('config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){

  $id = filter_input(INPUT_GET, 'id');

  if($id) {

     $sql = $pdo->prepare("SELECT * FROM series WHERE id = :id");
     $sql->bindValue(':id', $id);
     $sql->execute();

     if($sql->rowCount() > 0) {

        $data = $sql->fetch(PDO::FETCH_ASSOC);
        

        $array['result'][] = [
            'id' => $data['id'],
            'serie' => $data['serie'],
            'ano' => $data['ano'],
            'numero_temporadas' => $data['numero_temporadas'],
            'categoria' => $data['categoria'],
            'sinopse' => $data['sinopse']
        ];


     }else {
         $array['error'] = 'ID Inexistente';
     }

  }else {
      $array['error'] = 'ID nao enviado';
  }

} else { 
    $array['error'] = 'Metodo nao permitido( Apenas GET)';
}
 
require('return.php');