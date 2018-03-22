<?php echo $header;?>

<body>

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

<script type="text/javascript">
	$(document).ready(function()
	{
    	$("#sKatu").change(function()
    	{
    		$url="http://localhost/CI/index.php/podkat/" + $( "#sKatu" ).val();
    		$("#sPodKatu").load($url);
    	});
    });
</script>

<script type="text/javascript">
	$(document).ready(function()
	{
    	$("#zam").change(function()
    	{
    		$url="http://localhost/CI/index.php/zamowienia/" + $( "#zam" );
    		$("#status").load($url);
    	});
    });
</script>

<body>

<div style="width:49%;float:left">

<div style="background-color:GREY; width:50%;margin-left:1%;">

<br><center><h2>Dodawanie produktów</h2></center><br>
<form action="/CI/index.php/dodp" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Nazwa</label>
    <div class="col-md-9">
      <input id="Nazwap" name="nazwap" type="text" placeholder="Nazwa Produktu" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Opis</label>
    <div class="col-md-9">
      <input id="Opisp" name="opisp" type="text" placeholder="Opis" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Cena</label>
    <div class="col-md-9">
      <input id="cena" name="cenap" type="text" placeholder="Cena Netto" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label" for="nTytul">Vat</label>
    <div class="col-md-9">
      <input id="vat" name="vatp" type="text" placeholder="Vat" class="form-control">
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
<input type="submit" value="Dodaj">
</form>
</div>
</div>
<br>

<div style="background-color:GREY; width:50%;margin-left:1%;">
<form action="/CI/index.php/EdycjaStatusu" method="post">
<div class="form-group">
<label for="sel1">Zamówienie</label>
<select name="zamowienie" id="zam" class="form-control">
	<?php echo $zamowienia;?>
</select>
Status
<select name="status" id="status" class="form-control">
	<option value="1">przyjeta</option>
	<option value="2">w trakcie pakowania</option>
	<option value="3">spakowana i wyslana</option>
	<option value="4">dostarczona</option>
</select>
<br>
<input type="submit" value="Update">
</form>
</div>
</div>
</div>

<div style="width:49%;float:right">
  <div class="container">
      <div class="row">

  <div style="margin-left:-35%;">

        <div class="col-md-6 col-md-offset-3">
          <div class="well well-sm">
            <form class="form-horizontal" action="/CI/index.php/dodk" method="post">
            <fieldset>
              <legend class="text-center">Dodaj Kategorie</legend>

              <div class="form-group">
                <label class="col-md-3 control-label" for="nTytul">Nazwa</label>
                <div class="col-md-9">
                  <input id="kNazwa" name="kNazwa" type="text" placeholder="Nazwa Kategorii" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
                </div>
              </div>
            </fieldset>
            </form>
          </div>
        </div>
      </div>

      <div style="margin-left:-35%">

            <div class="col-md-6 col-md-offset-3">
              <div class="well well-sm">
                <form class="form-horizontal" action="/CI/index.php/dodpk" method="post">
                <fieldset>
                  <legend class="text-center">Dodaj Podkategorie</legend>

                  <div class="form-group">
                    <label class="col-md-3 control-label" for="nTytul">Nazwa</label>
                    <div class="col-md-9">
                      <input id="pkNazwa" name="pkNazwa" type="text" placeholder="Nazwa Podkategorii" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label" for="nTytul">Należy do</label>
                    <div class="col-md-9">
                      <select name="Katf" id="sKat" class="form-control">
                        <?php echo $kategorie;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12 text-right">
                      <button type="submit" class="btn btn-primary btn-lg">Dodaj</button>
                    </div>
                  </div>
                </fieldset>
                </form>
              </div>
            </div>
          </div>

          <div style="margin-left:-35%">

                <div class="col-md-6 col-md-offset-3">
                  <div class="well well-sm">
                    <form class="form-horizontal" action="/CI/index.php/EdycjaKategorii" method="post">
                    <fieldset>
                      <legend class="text-center">Edytuj Kategorie</legend>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="nTytul">Kategoria</label>
                      <select name="sKate" id="sKate" class="form-control" style="width:50%;">
                        <?php echo $kategorie;?>
                      </select>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="nTytul">Nowa nazwa</label>
                        <div class="col-md-9">
                          <input id="nkatn" style="width:50%;" name="nkatn" type="text" placeholder="Nowa Nazwa Kategorii" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 text-right">
                          <button type="submit" style="margin-right:0.7vw" class="btn btn-primary btn-lg">Dodaj</button>
                        </div>
                      </div>
                    </fieldset>
                    </form>
                  </div>
                </div>
              </div>

              <div style="margin-left:-35%">

                <div class="col-md-6 col-md-offset-3">
                  <div class="well well-sm">
                    <form class="form-horizontal" action="/CI/index.php/EdycjaPodkategorii" method="post">
                    <fieldset>
                      <legend class="text-center">Edytuj Podkategorie</legend>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="nTytul">Kategoria</label>
                      <select name="sKate" id="sKatu" class="form-control" style="width:50%;">
                        <?php echo $kategorie;?>
                      </select>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="nTytul">Podkategoria</label>
                      <select name="spKate" id="sPodKatu" class="form-control" style="width:50%;">
                        <?php echo $podKategorie;?>
                      </select>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="nTytul">Nowa nazwa</label>
                        <div class="col-md-9">
                          <input id="npkatn" style="width:50%;" name="npkatn" type="text" placeholder="Nowa Nazwa Podkategorii" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 text-right">
                          <button type="submit" style="margin-right:1.4vw" class="btn btn-primary btn-lg">Dodaj</button>
                        </div>
                      </div>
                    </fieldset>
                    </form>
                  </div>
                </div>
              </div>

</div>
</body>
