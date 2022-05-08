<?php
  include 'inc/Header.php';
  include 'lib/User.php';
?>

<?php
  $user = new User();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
      $userLogin = $user->userLogin($_POST);
      // print_r($_POST);
  }
?>

    <div class="card mt-3">
      <div class="card-header">
        <h3 class="float-left">User Login</h3>
      </div>
      <div class="card-body">
          <div class="div" style="max-width: 600px; margin:0 auto">
            <?php
                if (isset($userLogin)) {
                  echo $userLogin;
                }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>  
                <div class="form-group">
                    <button name="login" type="submit" class="btn btn-primary mt-2">Submit</button>
                </div>
            </form>
          </div>
           
      </div>
    </div>
<?php
  include 'inc/Footer.php'
?>
   