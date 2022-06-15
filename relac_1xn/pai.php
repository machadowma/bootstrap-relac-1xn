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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body class="bg-light">
       

<?php include("menu.php"); ?>

<div class="container">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["id"])){
    $_SESSION["id_pai"] = $_GET["id"];
  }
}
?>



<div class="sticky-top bg-light">
  <div class="row" style="padding:1em;">
    <div class="col-6">
      <a href="index.php" class="btn btn-secondary btn-rounded" ><span class='bi-reply'></span></a>
      <a href="filho_add_form.php" class="btn btn-primary btn-rounded" ><span class='bi-person-plus'></span></a>	
    </div>
    <div class="col-6 text-end">
    <a href="pai_excluir.php?id=<?php echo $_SESSION["id_pai"]; ?>" class="btn btn-danger btn-rounded" ><span class='bi-trash'></span></a>
    </div>
  </div>
  
</div>



<?php

echo "<input type='hidden' id='id_ciclo' name='id_pai' value='".$_SESSION["id_pai"]."'>";

include("banco_dados_conexao.php");
try {
  $sth = $dbh->prepare('select * from pai where id = '.$_SESSION["id_pai"].' ');
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  $nome_pai = $result[0]["nome"];
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
  die();
}

echo "<h3>$nome_pai</h3>";

if(isset($_SESSION["id_pai"])) {

  try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sth = $dbh->prepare('select id,nome from filho where id_pai = '.$_SESSION["id_pai"].' ');
    $sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		// escrevendo cabeçalho a partir dos índices do vetor FETCH_ASSOC

		echo '<div class="table-responsive"> ';
   		echo '<table class="table">';
		echo "<thead>";
		echo "<tr>";
        
		foreach($result[0] as $index=>$values) {
			echo "<th>$index</th>";
		}
		echo "<th></th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		// escrevendo resultado do SELECT
		foreach($result as $row) {
			echo "<tr>";
			foreach($row as $value){
				echo "<td>$value</td>";
			}
			echo "<td>";
			echo "<a href='filho_excluir.php?id=".$row["id"]."'>";
			echo '<i class="bi bi-x-square"></i>';
			echo "</a>";
			echo "</td>";
			echo "</tr>";
		}

		echo '</tbody>';
		echo '</table>';
		echo '</div>';

		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
}
?>



</div>


</body>
</html>
