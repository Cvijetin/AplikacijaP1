<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
   	$upit = $db->query("DELETE FROM jelo WHERE id = " . $id);
	header("Location:jelovnik.php");

	$rezultati = $query->fetchAll();
    $id = $rezultati[0]["id"];
    $naziv = $rezultati[0]["naziv"];
    $cijena = $rezultati[0]["cijena"];
    $opis = $rezultati[0]["opis"];
    $slika = $rezultati[0]["slika"];
}else{
    $id = 0;
    $naziv= "";
   $cijena= "";
    $opis = "";
    $slika = "";
}

?>
<h3>Jelovnik</h3>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="jelo_sql.php" enctype="multipart/form-data" name="form" id="forma-albumi">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    Želite li stvarno obrisati jelo "<b><?php echo $naziv; ?></b>"

    <input type="submit" name="submit" value="Potvrdi" class="btn btn-success">&nbsp;&nbsp;
    <input type="submit" name="submit" value="Odustani" class="btn btn-danger">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>