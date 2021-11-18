<?php 

 class Tarefa {
 	private $id;
 	private $id_status;
 	private $serie;
 	private $ano;
	private $numero_temporadas;
	private $categoria;
	private $sinopse;
 	private $data_cadastro;

 	public function __get($atributo){
 		return $this->$atributo;
 	}

 	public function __set($atributo, $valor){
 		$this->$atributo = $valor;
 	}
 }

?>