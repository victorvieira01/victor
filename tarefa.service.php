<?php

class TarefaService {

	 private $conexao;
	 private $tarefa;

	 public function __construct(Conexao $conexao, Tarefa $tarefa){
	 	$this->conexao = $conexao->conectar();
	 	$this->tarefa = $tarefa;
	 }


	//CRUD
	public function inserir(){ //CREATE
       $query = 'insert into series(serie,ano,numero_temporadas,categoria,sinopse)values(:serie,:ano,:numero_temporadas,:categoria,:sinopse)';
       $stmt = $this->conexao->prepare($query);
       $stmt->bindValue(':serie', $this->tarefa->__get('serie'));
	   $stmt->bindValue(':ano', $this->tarefa->__get('ano'));
	   $stmt->bindValue(':numero_temporadas', $this->tarefa->__get('numero_temporadas'));
	   $stmt->bindValue(':categoria', $this->tarefa->__get('categoria'));
	   $stmt->bindValue(':sinopse', $this->tarefa->__get('sinopse'));
       $stmt->execute();
	}

	public function recuperar(){ //READ

		$query = 'select 
		      t.id, s.status, t.serie, t.ano, t.numero_temporadas, t.categoria, t.sinopse
		 from
		      series as t
		   left join s_status as s on (t.id_status = s.id)
		   where
		   t.id_status = :id_status
		  ';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		 return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	

	public function atualizar(){ //UPDATE

		$query = "update series set serie = :serie, ano = :ano, numero_temporadas = :numero_temporadas, categoria = :categoria, sinopse = :sinopse where id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':serie', $this->tarefa->__get('serie'));
		$stmt->bindValue(':ano', $this->tarefa->__get('ano'));
		$stmt->bindValue(':numero_temporadas', $this->tarefa->__get('numero_temporadas'));
		$stmt->bindValue(':categoria', $this->tarefa->__get('categoria'));
		$stmt->bindValue(':sinopse', $this->tarefa->__get('sinopse'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		 return $stmt->execute();

	    	 

	}

	public function remover(){ //DELETE

		$query = 'delete from series where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();



	}

	public function marcarRealizada(){ //UPDATE

		$query = "update series set id_status = :id_status where id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		 return $stmt->execute();

	}

		public function recuperarTarefasPendentes(){ //READ

		$query = 'select 
		      t.id, s.status, t.serie, t.ano, t.numero_temporadas, t.categoria, t.sinopse
		 from
		      series as t
		   left join s_status as s on (t.id_status = s.id)
		   where
		    t.id_status = :id_status
		  ';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		 return $stmt->fetchAll(PDO::FETCH_OBJ);

	}
}



?>