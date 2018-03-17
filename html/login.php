<?php require_once('./model/login_model.php') ?>
<?php require_once('./model/registration_model.php') ?>
<script type="text/javascript">
  function isEmailValid(email){
    var re =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  function isNameValid(name) {
    var rej = /[a-zA-Z]/
    return rej.test(name);
  }

  function validateLogin(f) {
    if (!isEmailValid(f.email.value)){
      document.getElementById('alert').innerHTML = "You must provide Valid Email Address!";
      document.getElementById('alert').style.display = "block";
      return false;
    }else if (f.password.value.trim().length < 3){
      document.getElementById('alert').innerHTML = "You must provide password!";
      document.getElementById('alert').style.display = "block";
      return false;
    }
    document.getElementById('alert').style.display = "none";
    return true;
  }
  function validateRegister(f){
    if(!isEmailValid(f.register_email.value)){
      document.getElementById('alert').innerHTML = "You must provide Valid Email Address!";
      document.getElementById('alert').style.display = "block";
      return false;
    }else if (f.register_password.value.trim().length < 3){
      document.getElementById('alert').innerHTML = "You must provide password!";
      document.getElementById('alert').style.display = "block";
      return false;
    }else if(!isNameValid(f.register_first_name.value) && f.register_first_name.value.length > 1){
      document.getElementById('alert').innerHTML = "You must provide your Last Name!";
      document.getElementById('alert').style.display = "block";
      return false;
    }else if(!isNameValid(f.register_last_name.value) && f.register_last_name.value.length > 1){
      document.getElementById('alert').innerHTML = "You must provide your First Name!";
      document.getElementById('alert').style.display = "block";
      return false;
    }
    return true;
  }
</script>
<div class="template-render animated fadeIn" style="min-height: 83.5vh;">
<div class="col-md-12 col-xs-12"><h4 class="text-center alert alert-danger animated zoomIn" id="alert" style="display: none;"></h4></div>
    <?php if(@$_GET['status'] === 'something-went-wrong'): ?>
        <h4 class="text-center alert alert-info" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Something went wrong, please try again in couple of minutes.</h4>
    <?php elseif (@$_GET['status'] === 'banned'): ?>
        <h4 class="text-center alert alert-danger" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">This account has been banned form website.</h4>
    <?php elseif (@$_GET['status'] === 'password'): ?>
        <h4 class="text-center alert alert-warning" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Wrong Password.</h4>
    <?php elseif (@$_GET['status'] === 'not-registered'): ?>
        <h4 class="text-center alert alert-info" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">You don't have account yet? Please Register!.</h4>
    <?php endif; ?>
    <div class="container">
<div id="login" class="animated fadeInLeft">
<hr>
  <h1 class="jumbotron-hr" style="font-size:calc(16px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $title ?></h1>
  <form class="form-horizontal" method="post" action="index.php?log_in=try" name="login" onsubmit="return validateLogin(this);">
    <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
      </div>
    </div>
  </form>
</div>
<hr>
<hr>
<div id="register" class="animated fadeInRight">
  <h1 class="jumbotron-hr" style="font-size:calc(16px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $title_register ?></h1>
  <form class="form-horizontal" method="post" action="index.php?log_in=Log+In+%2F+Sign+Up" name="register" onsubmit="return validateRegister(this);">
    <div class="form-group">
      <label for="registerEmail" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="register_email" id="registerEmail" placeholder="Email" required>
      </div>
    </div>
    <div class="form-group">
      <label for="registerPassword" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="register_password" id="registerPassword" placeholder="Password" required>
      </div>
    </div>
    <div class="form-group">
      <label for="firstName" class="col-sm-2 control-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="FirstName" name="register_first_name" placeholder="First Name" required>
      </div>
    </div>
    <div class="form-group">
      <label for="lastName" class="col-sm-2 control-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lastName" name="register_last_name" placeholder="Last Name" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </div>
    </div>
  </form>
</div>
<hr>
<br>
</div>
</div>