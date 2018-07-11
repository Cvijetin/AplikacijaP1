<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<div class=\"justify-content-center\" style=\"margin-left: 35%; width: 100px\">
	<h3>Jelovnik</h3><br/>
	<div class=\"alert alert-success\" role=\"alert\">
	<a class=\"alert_link\" href='jelovnik_formular.php'>Dodaj jelo</a></div></div>";
	echo "<hr>";
	$query = $db->query("SELECT * FROM jelo");
}else{
	$query = $db->query("SELECT * FROM jelo WHERE id = " . $id);
	$rezultati = $query->fetchAll();
	echo "<h1>" . $rezultati[0]["naziv"] . "</h1>";
}


$rezultati = $query->fetchAll();

foreach($rezultati as $food){
	echo "<div class=\"row\" style=\"margin-top:1%; margin-left:25%\">";

		echo "<div class=\"col-lg-3 col-md-3\">";
			echo "<img src='slike/" . $food["slika"] . "' width=150px >";
		echo "</div>";

		echo "<div class=\"col-lg-5 col-md-5\">";
			echo "<strong>" . $food["naziv"] . "</strong>";
			echo "<p>" . $food["cijena"] . "</p>";
			echo "<p>" . $food["opis"] . "</p>";			
		echo "</div>";

		echo "<div class=\"col-lg-2 col-md-2\">";
		echo "<div class=\"alert alert-info\" role=\"alert\">
		<a class=\"alert_link\" href='jelovnik_formular.php?id=" . $food["id"] . "'>Uredi</a> </div><br>
			<div class=\"alert alert-danger\" role=\"alert\">
			<a class=\"alert_link\" href='jelovnik_brisanje.php?id=" . $food["id"] . "'>Obriši</a></div>";
		echo "</div>";

	echo "</div>";
	echo "<hr>";
}
?>

<?php
include("template_podnozje.html");
?>