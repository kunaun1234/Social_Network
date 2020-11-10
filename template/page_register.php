<!-- navbar -->
<?php require_once (__DIR__).("/object/navbar.php");?>

<div class="container" style="margin-top: 30px">
  <div class="row">
    
    <div class="col-lg-12">
      <h2>Register Page</h2>
      <form class="was-validated" method="POST" action="?page=register&act=register">

        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="Firstname">Email Address:</label>
              <input type="text" class="form-control" id="email" placeholder="Enter Email Address" name="email" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="Password">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="Firstname">Fistname:</label>
              <input type="text" class="form-control" id="firstname" placeholder="Enter Fistname" name="fistName" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="Lastname">Lastname:</label>
              <input type="text" class="form-control" id="Lastname" placeholder="Enter Lastname" name="lastName" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="con_password">Phone Number:</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter Confirm Password" name="tel" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  
  </div>
</div>


    <?php 
      if(isset($_GET["act"])){
        if($_GET["act"] == "register"){

          $user_query = $pdo->prepare("SELECT password FROM users WHERE email = :email OR firstName = :firstName OR lastName = :lastName");
          $user_query->execute(array(":email" => $_POST["email"],":firstName" => $_POST["fistName"],":lastName" => $_POST["lastName"]));


          if($user_query->rowCount()){
            //echo '<script>alert("ข้อมูลดังกล่างมีผู้ใช้งานไปแล้ว");window.location.href="?page=signup";</script>';
            alert('This email has been taken','error','?page=register');
          }else{
            if(strlen($_POST["password"]) < 8){
               //echo '<script>alert("รหัสผ่านของคุณน้อยกว่า 8 ตัว");window.location.href="?page=signup";</script>';
              alert('Password at least 8 characters and 1 digit','error','?page=register');
            } else {
                $insert_query = $pdo->prepare("INSERT INTO users (email,password,firstname,lastname,tel) VALUES (:email,:password,:firstname,:lastname,:tel)");
                $q = $insert_query->execute(array(":email" => $_POST["email"],":password" => md5($_POST["password"]),":firstname" => $_POST["fistName"],":lastname" => $_POST["lastName"],":tel" => $_POST["tel"]));
                if($q){
                  alert('Register Complete','success','?page=login');
                }else{
                  alert('Register Failed','warning','?page=login');
                }
            }
          }
        }
      }