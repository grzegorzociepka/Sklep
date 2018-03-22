

<script type="text/javascript">
	$(document).ready(function()
	{
    	$("#sKat").change(function()
    	{
    		$url="http://localhost/CI/index.php/podkat/" + $( "#sKat" ).val();
    		$("#sPodKat").load($url);
    	});
    });
</script>


<div style="background-color:GREY; width:50%;margin-left:1%;">

<br><center><h2>Edycja produktu</h2></center><br>
<form action="/CI/index.php/formep" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Nazwa</label>
    <div class="col-md-9">
      <input id="Nazwap" name="nazwap" type="text" placeholder="Nazwa Produktu" value="<?php echo $nazwa; ?>" class="form-control">
    </div>
  </div>

<input type="hidden" name="towaryID" value=<?php echo $_GET['sid'] ?> >

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul" >Opis</label>
    <div class="col-md-9">
      <input id="Opisp" name="opisp" type="text" placeholder="Opis" value="<?php echo $opis; ?>" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul" >Cena</label>
    <div class="col-md-9">
      <input id="cena" name="cenap" type="text" placeholder="Cena Netto" value="<?php echo $cena_netto; ?>" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Vat</label>
    <div class="col-md-9">
      <input id="vat" name="vatp" type="text" placeholder="Vat" value="<?php echo $stawka_vat*100; ?>" class="form-control">
    </div>
    <br>
  </div>

	<div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Fota</label>
    <div class="col-md-9">
      <input id="fota" name="zdj" type="file" class="form-control" >
    </div>
  </div>

  <div class="form-group">
  <label for="sel1">Kategoria:</label>
  <select name="Kat" id="sKat" class="form-control">
    <?php echo $kategorie;?>
  </select>
  Podkategoria:
  <select name="podKat" id="sPodKat" class="form-control">
    <?php echo $podKategorie;?>
  </select>
<br>
<input type="submit" value="Update">
</form>
</div>
</div>
<br>
