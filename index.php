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
      <?php
        $user = new User();
        $userData = $user->getUser();

        if($userData) {
          $i = 0;
          foreach($userData as $data){
            $i++;
      ?>  
        <tr>
          <td><?= $i?></td>
          <td><?= $data['name']?></td>
          <td><?= $data['username']?></td>
          <td><?= $data['email']?></td>
          <td>
            <a href="profile.php?id=<?=$data['id']?>" class="btn btn-info">View</a>
            <a href="" class="btn btn-danger">delete</a>
          </td>
        </tr>
      <?php
        }} else {
      ?>
      <tr><td>No User Found</td></tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<?php
include 'inc/Footer.php'
?>