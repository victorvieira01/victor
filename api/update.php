<?php 

require('config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'put'){

    parse_str(file_get_contents('php://input'), $input);

   $id = $input['id'] ?? null;
   $id_status = $input['id_status'] ?? null;
   $serie = $input['serie'] ?? null;
   $ano = $input['ano'] ?? null;
   $numero_temporadas = $input['numero_temporadas'] ?? null;
   $categoria = $input['categoria'] ?? null;
   $sinopse = $input['sinopse'] ?? null;

   $id = filter_var($id);
   $id_status = filter_var($id_status);
   $serie = filter_var($serie);
   $ano = filter_var($ano);
   $numero_temporadas = filter_var($numero_temporadas);
   $categoria = filter_var($categoria);
   $sinopse = filter_var($sinopse);


   if($id && $id_status && $serie && $ano && $numero_temporadas && $categoria && $sinopse) {

       $sql = $pdo->prepare("SELECT * FROM series WHERE id = :id");
       $sql->bindValue(':id', $id);
       $sql->execute();

       if($sql->rowCount() > 0) {
           $sql = $pdo->prepare("UPDATE series SET id_status = :id_status, serie = :serie, ano = :ano, numero_temporadas = :numero_temporadas, categoria = :categoria, sinopse = :sinopse WHERE id = :id");
           $sql->bindValue(':id', $id);
           $sql->bindValue(':id_status', $id_status);
           $sql->bindValue(':serie', $serie);
           $sql->bindValue(':ano', $ano);
           $sql->bindValue(':numero_temporadas', $numero_temporadas);
           $sql->bindValue(':categoria', $categoria);
           $sql->bindValue(':sinopse', $sinopse);
           $sql->execute();

            $array['result'] = [
                'id' => $id,
                'id_status' => $id_status,
                'serie' => $serie,
                'ano' => $ano,
                'numero_temporadas' => $numero_temporadas,
                'categoria' => $categoria,
                'sinopse' => $sinopse
            ];
       
        } else {
            $array['error'] = 'ID inexistente';
        }

   } else {
       $array['error'] = 'Dados nao enviados';
   }


} else { 
    $array['error'] = 'Metodo nao permitido( Apenas PUT)';
}
 
require('return.php');