<?php echo $header;?>

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<center><h3 class="panel-title">Dołącz do nas już dziś !</h3></center>
			 			</div>
			 			<div class="panel-body">
			    		<form action="/CI/index.php/rejestracja" method="POST">
			    			<div class="row">

			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="imie" id="first_name" class="form-control input-sm" placeholder="Imie">
			    					</div>
			    				</div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="nazwisko" id="first_name" class="form-control input-sm" placeholder="Nazwisko">
			    					</div>
			    				</div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="miejscowosc" id="first_name" class="form-control input-sm" placeholder="Miejscowośc">
			    					</div>
			    				</div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="adres" id="first_name" class="form-control input-sm" placeholder="Adres">
			    					</div>
			    				</div><div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="kodpocztowy" id="first_name" class="form-control input-sm" placeholder="Kod Pocztowy">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input required type="text" name="poczta" id="last_name" class="form-control input-sm" placeholder="Poczta">
			    					</div>
			    				</div>
			    			</div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input required type="text" name="login" id="first_name" class="form-control input-sm" placeholder="Login">
                  </div>
                </div><div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input required type="password" name="haslo" id="first_name" class="form-control input-sm" placeholder="Hasło">
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input required type="text" name="wiek" id="first_name" class="form-control input-sm" placeholder="Wiek">
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <select name="woj">
                                    <option value="Dolnośląskie">Dolnośląskie</option>
                                    <option value="Kujawsko-Pomorskie">Kujawsko-Pomorskie</option>
                                    <option value="Lubelskie">Lubelskie</option>
                                    <option value="Lubuskie">Lubuskie</option>
                                    <option value="Łódzkie">Łódzkie</option>
                                    <option value="Małopolskie">Małopolskie</option>
                                    <option value="Mazowieckie">Mazowieckie</option>
                                    <option value="Opolskie">Opolskie</option>
                                    <option value="Podkarpackie">Podkarpackie</option>
                                    <option value="Podlaskie">Podlaskie</option>
                                    <option value="Pomorskie">Pomorskie</option>
                                    <option value="Śląskie">Śląskie</option>
                                    <option value="Świętokrzyskie">Świętokrzyskie</option>
                                    <option value="Warmińsko-Mazurskie">Warmińsko-Mazurskie</option>
                                    <option value="Wielkopolskie">Wielkopolskie</option>
                                    <option value="Zachodniopomorskie">Zachodniopomorskie</option>
           </select>
                  </div>
                </div>

	    			    <input required type="submit" value="Zarejestruj" class="btn btn-info btn-block">

			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
