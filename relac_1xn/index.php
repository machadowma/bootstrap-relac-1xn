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

<div class="sticky-top bg-light">
<div class="d-flex flex-wrap bg-light">
<div class=1p-2 border1 style="padding:1em;">
<a href="pai_add_form.php" class="btn btn-primary btn-rounded" ><span class='bi-person-plus'></span></a>	
</div>
</div>
</div>


 
<h1>Lista de Pais</h1>


      
	<?php
	
	include("banco_dados_conexao.php");
	
	try {
	
		
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare('SELECT * from pai');
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		// escrevendo cabeçalho a partir dos índices do vetor FETCH_ASSOC

		echo '<div class="table-responsive"> ';
   		echo '<table class="table">';
		echo "<thead>";
		echo "<tr><th></th>";
        
		foreach($result[0] as $index=>$values) {
			echo "<th>$index</th>";
		}
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		// escrevendo resultado do SELECT
		foreach($result as $row) {
			echo "<tr>";
			echo "<td>";
			echo "<a href='pai.php?id=".$row["id"]."'>";
			echo '<i class="bi-box-arrow-in-up-right"></i>';
			echo "</a>";
			echo "</td>";
			foreach($row as $value){
				echo "<td>$value</td>";
			}
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

	
	?>
</div> 


</body>
</html>


