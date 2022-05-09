<?php
  include 'inc/Header.php';
  include 'lib/User.php';
  $user = new User();
?>

<?php
  $loginMsg = Session::get('loginMsg');
  if (isset($loginMsg)) {
    echo $loginMsg;
  }
  Session::set('loginMsg',NULL);
  Session::checkSession();
?>

<div class="card mt-3">
  <div class="card-header">
    <h3 class="float-left">User List</h3>
    <p class="float-right">Welcome!
      <span>
        <?php 
          $name = Session::get('name');
          if(isset($name)){
            echo $name;
          }
        ?>
      </span>
    </p>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>SL</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>01</td>
          <td>01</td>
          <td>01</td>
          <td>01</td>
          <td>
            <a href="" class="btn btn-info">View</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php
include 'inc/Footer.php'
?>