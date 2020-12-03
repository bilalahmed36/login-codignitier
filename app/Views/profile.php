<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>

	<div class="col-md-4">
		<h1><?= $user['firstname']. ' ' .$user['lastname'] ?></h1>
	</div>
	<div class="col-md-8">

		<?php if (session()->get('success')): ?>

		<div class="alert alert-success">
		<?= session()->get('success'); ?>
		</div>

	   <?php endif; ?>
	<form action="/profile" method="POST">
    <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input name="firstname" class="form-control"  type="text" value="<?= set_value('firstname',$user['firstname']) ?>">
    </div>
  <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input name="lastname" class="form-control"  type="text" value="<?= set_value('lastname',$user['lastname']) ?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
     </div>
        <input name="email" class="form-control" readonly type="email" value="<?= $user['email']?>">
    </div> 
        <!-- form-group end.// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input name="password" class="form-control" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input name="password_confirm" class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->

    <?php if (isset($validation)): ?> 
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>                                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Update  </button>
    </div> <!-- form-group// -->                                                                       
</form>
	</div>	


<?= $this->endSection() ?>