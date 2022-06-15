<!DOCTYPE html>
<html lang="en">
<head>
  <title>Exemplo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  
</head>
<body class="bg-light">

<?php include("menu.php"); ?>

<div class="container" align=center>

	<h1>Novo Pai</h1>
    <form action="pai_add_action.php" method="post">
    <div class="form-group">
		<input type="text" class="form-control" id="nome" name="nome" placeHolder="Nome do pai">
    </div>
	<br>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="index.php" class="btn btn-secondary">voltar</a>
  </form>

</div>

</body>
</html>