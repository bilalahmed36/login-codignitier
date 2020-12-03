<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>

		<div class="col-md-3"></div>
    	<div class="col-md-6 ">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login</h3>
			    	
			 	</div>
			 	<?php if (session()->get('success')): ?>

			 	<div class="alert alert-success">
			 		<?= session()->get('success'); ?>
			 	</div>

			 <?php endif; ?>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="/" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="yourmail@example.com" name="email" type="text" value="<?= set_value('email') ?>">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    	    <p class="text-center">Don't have an account? <a href="/register">Register Now</a> </p>
			    	    <?php if (isset($validation)): ?> 
					      <div class="alert alert-danger">
					        <?= $validation->listErrors() ?>
					      </div>
					    <?php endif; ?>  
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
                      <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook">
			    </div>
			</div>
		</div>
	
	


<?= $this->endSection() ?>