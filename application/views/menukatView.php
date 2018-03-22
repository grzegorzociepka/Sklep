
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

<div class='topnav' style="margin-top:-3.1vh;">
  <form action="/CI/index.php/kt" method="POST" class="form">
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
<input type="submit" value="Szukaj">
</form>
</div>
</div>
<br>
