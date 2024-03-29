<?php
  include 'inc/Header.php';
  include 'lib/User.php';
?>
<?php
  if (isset($_GET['id'])) {
    $userId = $_GET['id'];
  }
  $user = new User();
?>
<div class="card mt-3">
  <div class="card-header">
    <h3 class="float-left">User Profile</h3>
    <a href="index.php" class="btn btn-danger float-right">Back</a>
  </div>
  <div class="card-body">
    <div class="div" style="max-width: 600px; margin:0 auto">
      <?php
        $userData = $user->getUserById($userId);
        echo $userData;
      ?>
      <form action="">
        <div class="form-group">
          <label for="">User Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">User Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary mt-2">Update</button>
        </div>
      </form>
    </div>

  </div>
</div>
<?php
include 'inc/Footer.php'
?>