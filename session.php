<?php
session_start();
$ime_i_prezime = isset($_SESSION["ime_i_prezime"]) ? $_SESSION["ime_i_prezime"] : "";
if(!isset($_SESSION["korisnik"])){
	header("Location:login.php");
}
?>