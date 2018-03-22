<style>
.img {
   width: 100%;
   height: 40%;
}

</style>
<div class="col-sm-4">
  <div class="thumbnail" >EDYCJA
    <h4 class="text-center"><span class="label label-info"><?php echo $nazwapk; ?></span></h4>
    <div>
    <img src="<?php echo base_url().$imageLink; ?>"  class="img">
    <div>
    <div class="caption">
      <div class="row">
        <div class="col-md-6 col-xs-6">
          <h3><?php echo $nazwa; ?></h3>
        </div>
        <div class="col-md-6 col-xs-6 price">
          <h3>
          <label><?php echo $cena_brutto; ?>zł</label></h3>
        </div>
      </div>
      <p><?php echo $opis; ?></p>
      <div class="row">
        <div class="col-md-6">
    <a href="/CI/index.php/edycjapr?sid=<?php echo $towaryID; ?>" class="btn btn-success btn-product"> Wincyj</a></div>
      </div>

      <p> </p>
    </div>
  </div>
</div>
</div>
</div>
