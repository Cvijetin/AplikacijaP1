<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");


$id = isset($_GET["id"]) ? $_GET["id"] : 0;
//ukoliko je $id == 0 onda je otvoreno dodavanje novog zapisa
//ako je $id != 0 onda uređujemo postojeći zapis i treba ući u bazu i popuniti polja 

if($id != 0){
    $query = $db->query("SELECT * FROM jelo WHERE id = $id");
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
<h3 style="text-align: center;">Jelovnik</h3>


<div class="row" style="margin-left: 35%">
	<div class="medium-12 large-12 columns">

    <form method="post" action="jelo_sql.php" enctype="multipart/form-data" name="form" id="forma-albumi">
    <input type="hidden" name="id" value="<?php echo $id;?>">

    <label class="bmd-label-floating">Naziv jela</label>
    <input type="text" class="form-control" name="naziv" value="<?php echo $naziv;?>">

	
    <label class="bmd-label-floating">Cijena</label>
    <input type="text" name="cijena" style="width: 400px" class="form-control" value="<?php echo $cijena;?>">

     <label class="bmd-label-floating">Opis jela</label>
     <input type="text" name="opis" class="form-control" value="<?php echo $opis;?>">

     <label class="bmd-label-floating">Slika</label><br>
     <input type="text" name="slika" value="<?php echo $slika;?>" >
    <?php
        if($slika == ""){
            $slike = "dummy.jpg";
        }else{
            $slike = $slika;
        }
    ?>
	<img src="slike/<?php echo $slike; ?>" width="100"><br><br>

    <input type="submit" name="submit" value="Dodaj/Uredi" class="btn btn-success">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>