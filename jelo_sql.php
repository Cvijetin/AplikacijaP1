<?php
include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
	header("Location:jelovnik.php");
}

//Ukoliko $_POST["id_albuma"] je nula ($_POST["id_albuma"] == 0) onda znači da dodajemo novi zapis
//Ukoliko $_POST["id_albuma"] nije 0 onda uređujemo postojeći ili brišemo zapis
	//Ako je $_POST["submit"] == "Dodaj/Uredi" onda znači da uređujemo postojeći zapis
	//Ako je $_POST["submit"] == "Potvrdi" onda znači da brišemo postojeći zapis
	//Ako je $_POST["submit"] == "Odustani" onda znači da je pokrenuto brisanje, ali treba odustati i vratiti na albumi.php (ovo može služiti i za odustajanje u bilo kojem slučaju, ako na formu za uređivanje/dodavanje dodamo gumb odustani)


if($_FILES["slika"]["name"]){
/*
Ukoliko postoji $_FILES["slika"]["name"] znači da je datoteka odabrana i trebaju prebaciti na server u folder sa slikama
$_FILES["slika"]["name"] sadrži originalni naziv datoteke bez putanje
$_FILES["slika"]["tmp_name"] sadrži privremeni naziv datoteke koji se koristi u procesu uploada
*/
	$putanja = "slike/"; //putanja do direktorija za upload
	move_uploaded_file($_FILES["slika"]["tmp_name"], $putanja . $_FILES["slika"]["name"]);

/*
Nakon što se datoteka smjesti na svoje mjesto na serveru treba pripremiti podatak za upis u bazu.
*/
	$uploadana_slika = $_FILES["slika"]["name"];

}else{
// ako ne postoji $_FILES["slika"]["name"] onda u bazu upisujemo sadržaj $_POST["omot"] hidden polja
	$uploadana_slika = $_POST["slika"];
}

if($_POST["id"] > 0 && $_POST["submit"] == "Dodaj/Uredi" ){
	$upit = $db->query("UPDATE jelo SET 
		naziv = '" . $_POST["naziv"] . "',
		cijena = '" . $_POST["cijena"] . "',
		opis = '" . $_POST["opis"] . "',
		slika = '" . $uploadana_slika . "'
		WHERE
		id = " . $_POST["id"] . "

		");
	header("Location:jelovnik.php");


}elseif($_POST["id"] > 0 && $_POST["submit"] == "Potvrdi" ){
	$upit = $db->query("DELETE FROM jelo WHERE id = " . $_POST["id"]);
	header("Location:jelovnik.php");


}elseif($_POST["id"] == 0){
	$upit = $db->query("INSERT INTO jelo 
		(naziv, cijena, opis, slika)VALUES
		('" . $_POST["naziv"] . "',
		'" . $_POST["cijena"] . "',
		'" . $_POST["opis"] . "',
		'" . $uploadana_slika . "')
		");
	header("Location:jelovnik.php");
}

?>
