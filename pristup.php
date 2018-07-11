<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM administratori");
$rezultati = $query->fetchAll();
?>
<table style="margin-left: 25%">
	<tr>
	<th>Administratori</th>
	<th><div class="alert alert-success" role="alert"><a href="pristup_forma.php" class="alert-link" style="margin-left: 10%">Dodaj</a></div></th>

	<tr>
<?php


foreach($rezultati as $stavka){
	echo "<tr>
			<td>" . $stavka["ime"] . " " . $stavka["prezime"] . "</td>
		  	<td>
		  	<div class=\"alert alert-info\" role=\"alert\">
		  	<a class=\"alert_link\" href=\"pristup_forma.php?id=" . $stavka["id"] . "\">Uredi</a> </div>
		  	</td>
		  	<td>
		  	<div class=\"alert alert-danger\" role=\"alert\">
		  	<a class=\"alert_link\" href=\"pristup_izmjena.php?akcija=brisanje&id=" . $stavka["id"] . "\">Obriši</a></div></td>
		  </tr>";
}
?>
</table>
<?php
include("template_podnozje.html");
?>