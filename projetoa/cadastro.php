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
			<a class="navbar-brand " href="#">Home</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item active">
						<a class="nav-link" href="inicio.php"><span style="color:pink;"><i class="fas fa-sun fa-spin"></i> </span> Home <span class="sr-only">(página atual)</span></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href=""><span style="color:pink;"><i class="fas fa-user-tie"
						></i></span> Quem somos </a>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 <span style="color:pink;"><i class="fas fa-newspaper"></i></span> Produtos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="feminas.php"> Moda Feminino </a>
						  <a class="dropdown-item" href="back.html"> Masculina</a>
						  <div class="dropdown-divider"></div>
						  <a class="dropdown-item" href="redes.html"> Calçados </a>
						</div>
						</li>
						 <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 <span style="color:pink;"><i class="fas fa-newspaper"></i></span> Entrar
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="feminas.php">Login</a>
						  <a class="dropdown-item" href="back.html">Meus pedidos</a>
						  <div class="dropdown-divider"></div>
						  <a class="dropdown-item" href="redes.html">Endereço</a>
						</div>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
					  <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
					  <button class="btn btn-outline-light my-2 my-sm-0" style="color:orange"type="submit">Pesquisar</button>
					</form>
				  </div>
				 </nav>
			<br><br><br>
				<div class="container">
				<img src="im2.jpg" class="img-fluid" style="border: solid 1px pink;"/>
				<img src="im.jpg" class="img-fluid" style="border: solid 1px pink;"/>
				
				<?php

// Variáveis recebem dados do POST (criptografados - ninguém vê)
$n = $_POST["nome"];
$e = $_POST["email"];
$u = $_POST["usuario"];
$s = $_POST["senha"];

$erro = "Nada";
$link = "#";
$botao = "Botao";

// Conectar o BD
$conexao = new mysqli("localhost","root","","banco");

// Verifica se está conectado
if($conexao->error)
		die("Erro: " . $conexao->error);

// Verifica dados de CADASTRO
if(($n=="")||($e=="")||($u=="")||($s=="")){
		$erro = "Você deixou Campo(s) Vazio(s)!!!";
		$link = "cadastro.html";
		$botao = "Cadastro";
}else{
		$sql = "INSERT INTO usuarios(nome,email,usuario,senha) 
				VALUES ('{$n}','{$e}','{$u}','{$s}');";
		if($conexao->query($sql) === TRUE){
				$erro = "{$n}, você foi cadastrado com sucesso!!!";
$link = "login.html";
$botao = "Login";
		}else{
				$erro = "Cadastro não Realizado!!!";
				//$erro += ", Erro: " . $sql . "<br>" . $conexao->error;
		}
}
$conexao->close();
?>

<body>
<div class="container" style="height: 45%;">
<div class="row">
<div class="col-md-12"><h1>&nbsp;</h1></div>
</div>
</div>
<div class="container" style="height: 45%;">
<div class="row">
<div class="col-md-12 text-center"><h1>Cadastro</h1></div>
</div>
</div>
<div class="container" style="height: 45%;">
<div class="row">
<div class="col-md-12"><h1>&nbsp;</h1></div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-3">&nbsp;</div>
<div class="col-md-6" style="background: #000000">
	<form action="<?php echo $link;?>">
		<div class="row form">
			<div class="form-group col-md-6">
				<label>&nbsp;</label>
			</div>
			<div class="form-group col-md-6">
				<label>&nbsp;</label>
			</div>
		</div>
		<div class="form">
			<div class="form-group text-center">
				<h4><b><i><?php echo $erro; ?></i></b></h4>
			</div>
			<div class="form-group">
				<label>&nbsp;</label>
			</div>
			<div class="form-group col-md-12 text-center">
				<button type="submit" class="btn btn-danger" style="width: 150px">Ir para <?php echo $botao;?></button>
			</div>
		</div>
		<div class="row form">
			<div class="form-group">
				<label>&nbsp;</label>
			</div>
		</div>
	</form>
</div>
<div class="col-md-3">&nbsp;</div>
</div>
</div>
		
	</body>
</html>