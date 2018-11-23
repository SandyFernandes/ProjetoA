<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"-->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<title>Produtos</title>
		<style>
			body{background: #363636;color: #FF00FF;}
		</style>
	</head>
	<body style="background: #000000">
	<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="feminas (2).php"><img src="logo.png" class="img-fluid" style="width:70px; height:70px; "/></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" style="background: #000000" id="conteudoNavbarSuportado">
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item active">
						<a class="nav-link" href="feminas (2).php"><span style="color:pink;"><i class="fas fa-sun fa-spin"></i> </span> Home <span class="sr-only">(página atual)</span></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="somos.html"><span style="color:pink;"><i class="fas fa-user-tie"
						></i></span> Quem somos </a>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 <span style="color:pink;"><i class="fas fa-newspaper"></i></span> Produtos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="roupas.php"> Moda Feminino </a>
						  <a class="dropdown-item" href="masculino.php"> Masculina</a>
						  <div class="dropdown-divider"></div>
						  <a class="dropdown-item" href="calca.html"> Calçados </a>
						</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.html" data-toggle="modal" data-target="#login"><span style="color:pink;"><i class="fas fa-sign-in-alt"
							></i></span> Login </a>
					  </li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
					  <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
					  <button class="btn btn-outline-light my-2 my-sm-0" style="color:pink"type="submit">Pesquisar</button>
					</form>
				  </div>
				 </nav>
			<br><br><br>
				<div class="container">
				<img src="im2.jpg" class="img-fluid" style="border: solid 1px pink;"/>
				<img src="im.jpg" class="img-fluid" style="border: solid 1px pink;"/>
				<center>
			<?php
				// Inicializar SESSION para utilizar nesta PAGINA
				session_start();

				// Variáveis recebem dados do POST (criptografados - ninguém vê)
				$u = $_POST["usuario"];
				$s = $_POST["senha"];

				$erro = 0;

				// Conectar o BD
				$conexao = new mysqli("localhost","root","","banco");

				// Verifica se está conectado
				if($conexao->error)
					die("Erro: " . $conexao->error);
				
				// Verifica LOGIN
				if(($u=="")||($s=="")){
					echo "<meta http-equiv='refresh' content='2;URL=login.html'>";
					echo "<br><br><h3><i>Você deixou Campo(s) Vazio(s)!!!</i></h3>";
				}else{
					$sql = "SELECT * FROM usuarios;";
					$resultado = $conexao->query($sql);
					while($campo = $resultado->fetch_assoc()){
						if(($u==$campo["usuario"])&&($s==$campo["senha"])){
							if($u=="admin"){
								echo "<meta http-equiv='refresh' content='3;URL=admin.php'>";
							echo "<br><br><h3><i>Redirecionando...</i></h3>";
							}else{
								echo "<meta http-equiv='refresh' content='3;URL=inicio.php'>";
								echo "<br><br><h3><i>Redirecionando...</i></h3>";
							}
							$_SESSION["usuario"] = $campo["nome"];
							$erro = 0;
							break;
						}else{
							$erro = 1;
						}
					}
					if($erro==1){
						echo "<meta http-equiv='refresh' content='2;URL=login.html'>";
						echo "<br><br><h3><i>Os Dados informados são Inválidos!!!</i></h3>";
					}
				}
				$conexao->close();
			?>
			</center>
	</body>
</html>