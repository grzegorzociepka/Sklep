<?php echo $header;?>
<table id="table" cellpadding="6" cellspacing="1"  border="2">

<tr>
        <th>Ilośc mordo</th>
        <th>Opis</th>
        <th style="text-align:right">Cena</th>
        <th style="text-align:right">Całościowa cena</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items):  ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
        <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
        <td>
                        <?php echo $items['name']."<br>"; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?> zł</td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan = "2" > </td>
        <td class = "right" > <strong > Total </strong> </td>
        <td class = "right" ><center> <?php echo $this->cart->format_number( $this->cart->total ());  ?> zł</center></td>
</tr>

</table>
<br><?php
if($this->session->userdata['logged_in']==1){
  echo "<a href='/CI/index.php/kupowanie' class='btn btn-success btn-product'>Kup</a></div><br>";
  echo "<a href='/CI/index.php/czysc' class='btn btn-success btn-product'>Wyczysc koszyk</a></div>";
}
else {
  echo "<div style='background-color:white; width:8vw'><center><h4>Zaloguj sie by kupic </h4></center></div>";
}

?>
<?php



?>
