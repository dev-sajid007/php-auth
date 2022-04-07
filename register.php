<?php
  include 'inc/Header.php'
?>

    <div class="card mt-3">
      <div class="card-header">
        <h3 class="float-left">User Register</h3>
      </div>
      <div class="card-body">
          <div class="div" style="max-width: 600px; margin:0 auto">
            <form action="">
                <div class="form-group">
                    <label for="">Name</label>
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
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </div>
            </form>
          </div>
           
      </div>
    </div>
<?php
  include 'inc/Footer.php'
?>
   