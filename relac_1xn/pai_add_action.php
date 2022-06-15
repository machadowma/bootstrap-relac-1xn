<!DOCTYPE html>
<html lang="en">
<head>
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
            $stmt = $dbh->prepare("insert into pai (nome) values (?);");
            $stmt->bindParam(1, $nome);
            $nome = $_POST["nome"];
            if($stmt->execute()) {
                $id_pai = $dbh->lastInsertId();
                ?>
                <br>
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Pai adicionado com sucesso!</h4>
                <p>Um novo pai foi criado. Agora você pode incluir filhos para esse pai.</p>
                <hr>
                <a class="btn btn-primary" href="pai.php?id=<?php echo $id_pai; ?>" role="button"><span class='bi-box-arrow-in-up-right'></span>&nbsp;Abrir pai</a>
                <a href="index.php" class="btn btn-secondary btn-rounded" ><span class='bi-reply'></span>&nbsp;Voltar</a>	
                </div>
                <?php
            }
        
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'><span class='bi-reply'></span>&nbsp;voltar</a>";
            die();
        }
    ?>

</div>

</body>
</html>
