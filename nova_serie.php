<?php $years = range(1980, strftime("%Y", time())); ?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lista de séries</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) {  ?>

			<div class="bg-success pt-2 text-white">
				<div class="row">
					<div class="col-md-10 d-flex justify-content-center">
				<h5>Série inserida com sucesso! </h5>
				</div></div>
			</div>

		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
					    <li class="list-group-item"><a href="todas_series.php">Ja vi</a></li>
						<li class="list-group-item"><a href="index.php">Quero ver</a></li>
						<li class="list-group-item active"><a href="nova_serie.php">Adicionar nova série</a></li>
						
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Adicionar</h4>
								<hr />

								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Série:</label>
										<input name="serie" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>Ano de lançamento:</label>
										
								    <select class="form-control" name="ano" id="ano">
								  <option>Selecione o ano</option>
                                     <?php foreach($years as $year) : ?>
                                   <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                     <?php endforeach; ?>
                                    </select>
									  	
									</div>
									<div class="form-group">
										<label>Numero de temporadas:</label>
										<input name="numero_temporadas" type="number" class="form-control">
									</div> 
									
									
									<div class="form-group">
                                   <label>Categoria</label><br>
                                     <select class="form-control" name="categoria" id="categoria">
                                      <option value="Terror">Terror</option>
                                      <option value="Comédia">Comédia</option>
                                      <option value="Ação">Ação</option>
									  <option value="Drama">Drama</option>
									  <option value="Aventura">Aventura</option>
									  <option value="Romance">Romance</option>
									  <option value="Fantasia">Fantasia</option>
									  <option value="Ficção cientifica">Ficção cientifica</option>
                
                                    </select>
                                  </div>
									
									
									
									<div class="form-group">
										<label>Sinopse:</label>
										<textarea name="sinopse" class="form-control" row="3"></textarea>
									</div>
									

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>