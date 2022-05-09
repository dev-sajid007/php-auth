<?php
  include 'inc/Header.php';
  include 'lib/User.php';
?>

<?php
  $user = new User();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
      $userReg = $user->userRegistration($_POST);
      // print_r($_POST);
  }
  Session::checkLogin();
?>

    <div class="card mt-3">
      <div class="card-header">
        <h3 class="float-left">User Register</h3>
      </div>
      <div class="card-body">
          <div class="div" style="max-width: 600px; margin:0 auto">
            <?php
              if (isset($userReg)) {
                echo $userReg;
              }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" name="username" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" >
                </div>  
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-primary mt-2">Submit</button>
                </div>
            </form>
          </div>
           
      </div>
    </div>
<?php
  include 'inc/Footer.php'
?>
   