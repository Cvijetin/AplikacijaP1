<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;
if($id == 0){
	$ime = "";
	$prezime = "";
	$korisnicko_ime = "";
	$lozinka = "";
	$gumb = "Dodaj";
}else{
	$query = $db->query("SELECT * FROM administratori WHERE id = " . $id);
	$rezultati = $query->fetchAll();
	$ime = $rezultati[0]["ime"];
	$prezime = $rezultati[0]["prezime"];
	$korisnicko_ime = $rezultati[0]["korisnicko_ime"];
	$lozinka = $rezultati[0]["lozinka"];
	$gumb = "Spremi";	
}
	
?>
<div style="margin-left: 25%; margin-right: 25%">
<form method="post" action="pristup_izmjena.php?akcija=uredi&id=<?php echo $id ?>">

<label class="bmd-label-floating">Ime</label>
<input type="text" name="ime" class="form-control" value="<?php echo $ime ?>"><br>

<label class="bmd-label-floating">Prezime</label>
<input type="text" name="prezime" class="form-control" value="<?php echo $prezime ?>"><br>

<label class="bmd-label-floating">Korisničko ime</label>
<input type="text" class="form-control" name="korisnicko_ime" value="<?php echo $korisnicko_ime ?>"><br>
<label class="bmd-label-floating">Lozinka</label>
<input type="text" class="form-control" name="lozinka" value="<?php echo $lozinka ?>"><br>
<input type="submit" class="btn btn-primary" name="Submit" value="<?php echo $gumb ?>">
</form>
</div>
<?php
include("template_podnozje.html");
?>
