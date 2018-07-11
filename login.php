<?php
if(isset($_GET["logout"])){
	session_start();
	session_unset();
	session_destroy();
}
include("template_zaglavlje_login.html");
include("pdo.php");

$submit = isset($_POST["Submit"]) ? $_POST["Submit"] : false;
$korisnicko_ime = isset($_POST["korisnicko_ime"]) ? $_POST["korisnicko_ime"] : false;
$lozinka = isset($_POST["lozinka"]) ? $_POST["lozinka"] : false;

if($submit == "Dalje"){
	$query = $db->prepare("SELECT * FROM administratori WHERE korisnicko_ime = :korisnicko_ime AND lozinka = :lozinka");

	$query->bindParam(':korisnicko_ime', $korisnicko_ime, PDO::PARAM_STR);
	$query->bindParam(':lozinka', $lozinka, PDO::PARAM_STR);
	$query->execute();
	$rezultati = $query->fetchAll();
	if(count($rezultati) == 0){
		echo "<p style='color:#FF0000' align='center'>pogrešni korisnički podaci</p>";
	}else{
		session_start();
		$_SESSION["korisnik"] = $korisnicko_ime;
		$_SESSION["ime_i_prezime"] = $rezultati[0]["ime"] . " " . $rezultati[0]["prezime"];
		header("Location:jelovnik.php");
	}

}

?>
<div class="row justify-content-center">

<form action="" method="post">
	<div class="col-md-12">
     	<div class="form-group">
			<label class="bmd-label-floating">Korisnicko ime</label>
			<input type="text" class="form-control" name="korisnicko_ime"  /><br />
		</div>
	</div>
	<div class="col-md-12">
      <div class="form-group">
<label class="bmd-label-floating">Lozinka</label>
<input type="password" class="form-control" name="lozinka" /><br />
</div>
</div>
<div class="row justify-content-center">
<input type="submit" name="Submit" style="width: 200px" class="btn btn-primary" value="Dalje" />
</div>
</form>
</div>

<?php
include("template_podnozje.html");
?>