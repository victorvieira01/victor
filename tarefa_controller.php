
<?php

 	require "tarefa.model.php";
	require "tarefa.service.php";
	require "conexao.php";


  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; 



  if ($acao == 'inserir') {

	print_r($_POST);

  $tarefa = new Tarefa();
  $tarefa->__set('serie', $_POST['serie']);
  $tarefa->__set('ano', $_POST['ano']);
  $tarefa->__set('numero_temporadas', $_POST['numero_temporadas']);
  $tarefa->__set('categoria', $_POST['categoria']);
  $tarefa->__set('sinopse', $_POST['sinopse']);
  
  $conexao = new Conexao();

  $tarefaService = new TarefaService($conexao, $tarefa);
  $tarefaService->inserir();

  header('Location: nova_serie.php');

} else if($acao == 'recuperar') {
	
	$tarefa = new Tarefa();
	$tarefa->__set('id_status', 2);
	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefas = $tarefaService->recuperar();
	

} else if($acao == 'atualizar') {

	$tarefa = new Tarefa();
	$tarefa->__set('id', $_POST['id']);
	$tarefa->__set('serie', $_POST['serie']);
	$tarefa->__set('ano', $_POST['ano']);
	$tarefa->__set('numero_temporadas', $_POST['numero_temporadas']);
	$tarefa->__set('categoria', $_POST['categoria']);
	$tarefa->__set('sinopse', $_POST['sinopse']);

	$conexao = new Conexao();
	$tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->atualizar();
    
	if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
		header('location: index.php');	
	} else {
		header('location: todas_series.php');
	}
	
    	
    	

}else if($acao == 'remover') {

	$tarefa = new Tarefa();
	$tarefa->__set('id', $_GET['id']);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefaService->remover();

    if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
		header('location: index.php');	
	} else {
		header('location: todas_series.php');
	}

    
	

} else if($acao == 'marcarRealizada'){

	 $tarefa = new Tarefa();
	 $tarefa->__set('id', $_GET['id']);
	 $tarefa->__set('id_status', 2);

	 $conexao = new Conexao();

	 $tarefaService = new TarefaService($conexao, $tarefa);
	 $tarefaService->marcarRealizada();
	
	 if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
		header('location: index.php');	
	} else {
		header('location: todas_series.php');
	}

    

} else if($acao == 'recuperarTarefasPendentes') {
	$tarefa = new Tarefa();
	$tarefa->__set('id_status', 1);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefas = $tarefaService->recuperarTarefasPendentes();
}







?>