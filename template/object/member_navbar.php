<?php 
  $user_query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $user_query->execute(array(":email" => $_SESSION["email"]));
  $user = $user_query->fetch(PDO::FETCH_ASSOC);
?>
<nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">SoMeDai</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?page=home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="inbox" >Inbox</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=find">Find Friend</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="http://154.16.11.236/Social_network/images/profile/<?=$user['avatar'];?>" width="20" height="20" class="rounded-circle">
          <?=$results['firstName'];?> <?=$results['lastName'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="?page=profile">My Profile</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#changepass" href="#">Change Password</a>
          <a class="dropdown-item" href="?page=logout">Log Out</a>
        </div>
      </li> 
    </ul>
  </div>
</nav>


              <!-- The Modal -->
              <div class="modal fade" id="changepass">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Change Password</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <form method="POST" action="?page=profile&act=changepw">
                      <!-- Modal body -->
                      <div class="modal-body">
                        Old Password:
                        <input type="text" name="old_password" id="old_password" class="form-control mb-4" placeholder="Old Password" " required>
                        New Password:
                          <input type="text" name="new_password" id="new_password" class="form-control mb-4" placeholder="New Password" required>
                          Confirm Password:
                          <input type="text" name="con_password" id="con_password" class="form-control mb-4" placeholder="Confirm Password" required>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button class="btn btn-info" type="submit">Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                  </form>

                  </div>
                </div>
              </div>