<?php /*?><a href="tel:0557067850">0557067850</a><br/><br/><?php */?>
<?php
$username = array(
	"name" => "username",
	"id"   => "username",
	"type" => "text",
	"value" => (isset($_REQUEST["username"])?$_REQUEST["username"]:""),
	"placeholder" => "Username",
	"required" => "required",
	"class" => "form-control"
);
$password = array(
	"name" => "password",
	"id"   => "password",
	"type" => "password",
	"value" => (isset($_REQUEST["password"])?$_REQUEST["password"]:""),
	"placeholder" => "Password",
	"required" => "required",
	"class" => "form-control"
);
?>
<div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="<?php echo base_url(); ?>/assets/images/logo.png" class="h-6" alt="" style="height:6rem !important;">
              </div>
              <form class="card" action="" method="post" id="login-form">
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                  <div class="form-group">
                  	<label class="form-label">Username</label>
                    <?php echo form_input($username);?>
                    <?php /*?>  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username"><?php */?>
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                      <?php /*?><a href="./forgot-password.html" class="pull-right small">I forgot password</a><?php */?>
                    </label>
                    <?php echo form_input($password);?>
                    <?php /*?><input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><?php */?>
                  </div>
                  <?php /*?><div class="form-group">
                  	<label class="form-label">Panel</label>
                    <select name="panel" id="panel" class="form-control custom-select" required>
                        <option value="">Please Select Panel</option>
                        <option value="1">Admin Panel</option>
                        <option value="2">Number Generate Panel</option>
                        <option value="3">Back Office Panel</option>
                        <option value="4">TL TSA Panel</option>
                        <option value="10">TL CSR Panel</option>
                        <option value="5">Telesale Panel</option>
                        <option value="9">Manager</option>
                        <option value="8">Sales Manager</option>
                        <option value="7">DSE</option>
                        <option value="6">CSR</option>
                    </select>
                  </div><?php */?>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-group">
                      <a class="" href="tel:044197811"><i class="fe fe-phone" data-toggle="tooltip" title="" data-original-title="fe fe-phone"></i> Having Trouble?</a>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="login-btn">Sign in</button>
                  </div>
                </div>
              </form>
              <?php /*?><div class="text-center text-muted">
                Don't have account yet? <a href="./register.html">Sign up</a>
              </div><?php */?>
            </div>
          </div>
        </div>
      </div>
            