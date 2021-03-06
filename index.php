<?php

 $acao = 'recuperarTarefasPendentes';
 require 'tarefa_controller.php';
 



 ?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lista de séries</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

				<script>
			function editar(id, txt_tarefa, ano, numero_temporadas, categoria, sinopse){
				//criar form 
				let form = document.createElement('form')
				form.action = 'tarefa_controller.php?pag=index&acao=atualizar'
				form.method = 'post'
				form.className = 'row'


				//criar input
               let inputTarefa = document.createElement('input')
               inputTarefa.type = 'text'
               inputTarefa.name = 'serie'
               inputTarefa.className = 'col-9 form-control'
               inputTarefa.value = txt_tarefa

			   //input ano
			   let inputano = document.createElement('input')
			   inputano.type = 'number'
			   inputano.name = 'ano'
			   inputano.className = 'col-9 form-control'
			   inputano.value = ano

			   let inputtemp = document.createElement('input')
			   inputtemp.type = 'number'
			   inputtemp.name = 'numero_temporadas'
			   inputtemp.className = 'col-9 form-control'
			   inputtemp.value = numero_temporadas

			   //input categoria
			   let inputcat = document.createElement('input')
			   inputcat.type = 'text'
			   inputcat.name = 'categoria'
			   inputcat.className = 'col-9 form-control'
			   inputcat.value = categoria

			   //input sinopse
			   let inputsip = document.createElement('textarea')
			
			    inputsip.name = 'sinopse'
			    inputsip.className = 'col-9 form-control'
			    inputsip.value = sinopse


			   
               //criar um input hidden para guardar o id da tarefa

               let inputId = document.createElement('input')
               inputId.type = 'hidden'
               inputId.name = 'id'
               inputId.value = id

				//criar button
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//incluir InputTarefa no form
				form.appendChild(inputTarefa)

				//incluir Inputano no form
				form.appendChild(inputano)
				form.appendChild(inputtemp)
				form.appendChild(inputcat)
				form.appendChild(inputsip)
				

				//incluir inputHidden no form
				form.appendChild(inputId)

				//incluir botao no form
				form.appendChild(button)

				/* teste
				console.log(form)
				alert(id) 
				*/

				//selecionar tarefa
				let tarefa = document.getElementById('tarefa_'+id)

				//limpar o texto da tarefa para inclusao do form 
				tarefa.innerHTML = ''

				//inserir form na pagina
				tarefa.insertBefore(form, tarefa[0]) 
			}

			function remover(id){
				location.href = 'index.php?pag=index&acao=remover&id='+id
			}

			function marcarRealizada(id){
				location.href = 'index.php?pag=index&acao=marcarRealizada&id='+id
			}

		</script>
	</head>

	<body>
	<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Lista de séries
				</a>
			</div>
		</nav>

		<div class="container app">
			
					
			   <div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
					    <li class="list-group-item"><a href="todas_series.php">Ja vi</a></li>
						<li class="list-group-item active"><a href="index.php">Quero ver</a></li>
						<li class="list-group-item"><a href="nova_serie.php">Adicionar nova série</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Séries</h4>
				
								<hr />

																<?php 

																

								foreach($tarefas as $indice => $tarefa) {  ?>

								<div class="row mb-3 d-flex align-items-center">
									<div class="col" id="tarefa_<?= $tarefa->id ?>">
									<h3><strong><?= $tarefa->serie ?> </strong> <small>  (<?= $tarefa->status  ?>)</small></h3> 
									<strong>Ano: </strong> <?= $tarefa->ano ?> <br>
									<strong>Temporadas: </strong> <?= $tarefa->numero_temporadas ?> <br>
									<strong>Categoria: </strong> <?= $tarefa->categoria ?> <br>
									<strong>Sinopse: </strong> <?= $tarefa->sinopse ?> <br>
								     
								   <div> 
									
									
									
									<div class="col-md-4 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>,
										                                                       '<?= $tarefa->serie ?>',
																							    '<?=$tarefa->ano ?>',
																								'<?=$tarefa->numero_temporadas ?>',
																								'<?=$tarefa->categoria ?>',
																								'<?=$tarefa->sinopse ?>'
																								
																								 )"></i>
										<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>

									
									</div><br><hr /><br>
								</div>

							<?php } ?>
					</div>
				</div>
			</div>
		</div>


	</body>
</html>