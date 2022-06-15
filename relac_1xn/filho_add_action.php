<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" sizes="196x196" href="img/favicon.png">
  <title>Exemplo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<?php include("menu.php"); ?>

<div class="container">

	<?php



        try {
            include("banco_dados_conexao.php");
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare("insert into filho (nome,id_pai) values (?,?);");
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $id_pai);
            $nome=$_POST["nome"];
            $id_pai = $_SESSION["id_pai"];
            if($stmt->execute()) {
                ?>
                <br>
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Filho adicionado com sucesso!</h4>
                <hr>
                <a href="pai.php" class="btn btn-secondary btn-rounded">Voltar</a>	
                </div>
                <?php
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>Voltar</a>";
            die();
        }

    
    ?>
    
</div>

</body>
</html>
