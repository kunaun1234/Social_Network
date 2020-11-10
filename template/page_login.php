<!-- navbar -->
<?php require_once (__DIR__).("/object/navbar.php");?>

<div class="container" style="margin-top: 30px">
  <div class="row">
    <div class="col-lg-12">
      <h2>Login Pages</h2>
      <form method="POST" action="?page=login&act=login">
        <div class="form-group">
          <label for="uname">Email Address:</label>
          <input type="text" class="form-control" id="email" placeholder="Enter username" name="email" required>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <p>Not a Member? <a href="?page=register">Register Now!</a></p>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>


    <?php 
      if(isset($_GET["act"])){
        if($_GET["act"] == "login"){
          $user_query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
          $user_query->execute(array(":email" => $_POST["email"]));
          if($user_query->rowCount()){
            $user = $user_query->fetch(PDO::FETCH_ASSOC);
            if(md5($_POST["password"]) == $user["password"]){
              $_SESSION["email"] = $user["email"];
              $_SESSION["user_id"] = $user["id"];
              $_SESSION["login_member"] = true;
              $user_update = $pdo->prepare("UPDATE users SET session_login = :session_login WHERE email = :email");
              $user_update->execute(array(":session_login" => 1, ":email" => $_POST["email"]));
              $date_now = date("Y-m-d");
              $ip = $_SERVER["REMOTE_ADDR"];
              $history_updating = $pdo->prepare("INSERT INTO history_auth (email,ip,date_login) VALUES (:email,:ip,:dates)");
              $history_updating->execute(array(":ip" => $ip,":dates" => $date_now, ":email" => $_POST["email"]));
              //echo '<script>alert("เข้าสู่ระบบสำเร็จ");window.location.href="member/?page=home";</script>';
              alert('Login Success','success','index.php');
            }else{
              //echo '<script>alert("รหัสผ่านไม่ถูกต้อง");window.location.href="member/?page=home";</script>';
              alert('User Not Found','error','index.php?page=login');
            }
          }else{
            //echo '<script>alert("ไม่พบชื่อผู้ใช้งาน");window.location.href="member/?page=home";</script>';
            alert('User Not Found','error','index.php?page=login');
          }
        }
      }