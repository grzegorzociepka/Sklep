<?php echo $header;?>

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<center><h3 class="panel-title">Logowanie</h3></center>
			 			</div>
			 			<div class="panel-body">

			    		<form action="/CI/index.php/logowanie" method="POST">
			    			<div class="row">
                  
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input required type="text" name="login" id="login" class="form-control input-sm" placeholder="Login">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input required type="password" name="haslo" id="haslo" class="form-control input-sm" placeholder="Hasło">
                  </div>
                </div>

	    			    <input required type="submit" value="Logowanie" class="btn btn-info btn-block">

			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
