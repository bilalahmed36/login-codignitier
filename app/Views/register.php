<?= $this->extend('template/base') ?>
<?= $this->section('content') ?>

  <div class="col-md">
    
<div class="wrapper fadeInDown">
<div class="container">


<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
  <h4 class="card-title mt-3 text-center">Create Account</h4>
  <p class="text-center">Get started with your free account</p>
  <p>

    <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-official"></i>   Login via facebook</a>
  </p>
  <p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
  <form action="/register" method="POST">
    <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input name="firstname" class="form-control" placeholder="First Name" type="text" value="<?= set_value('firstname') ?>">
    </div>
  <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input name="lastname" class="form-control" placeholder="Last Name" type="text" value="<?= set_value('lastname') ?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
     </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" value="<?= set_value('email') ?>">
    </div> 
        <!-- form-group end.// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input name="password" class="form-control" placeholder="Create password" type="password">
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
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="/">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 

</div>
  </div>
  
  


<?= $this->endSection() ?>