
<!-- navbar -->
<?php require_once (__DIR__).("/../object/member_navbar.php");?>
<?php 
  $user_query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $user_query->execute(array(":email" => $_SESSION["email"]));
  $user = $user_query->fetch(PDO::FETCH_ASSOC);
?>

<style type="text/css">
	body {
            background-color: #eeeeee;
        }

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }
</style>

<!-- home code -->
<div class="container" style="margin-top: 30px">
  <div class="row">

    <div class="col-lg-12">
    	<div class="rows" style="margin-bottom: 20px">
    			<div class="card">
	                <div class="row">
	                	<div class="col-lg-2 col-sm-6">
		                	<img src="images/profile/<?=$user['avatar'];?>" width="180" height="180" class="rounded-circle">
		                </div>
		                <div class="col-lg-8 col-sm-6">
		                	<h2 style="position: absolute; bottom: 10px">
		                		<?=$results['firstName'];?> <?=$results['lastName'];?>
		                	</h2>
		                </div>
		                <div class="col-lg-2" >
		                	<!-- Button to Open the Modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  style="position: absolute; bottom: 10px; right: 30px">
							  Edit Profile
							</button>

							<!-- The Modal -->
							<div class="modal fade" id="myModal">
							  <div class="modal-dialog">
							    <div class="modal-content">

							      <!-- Modal Header -->
							      <div class="modal-header">
							        <h4 class="modal-title">Edit Profile</h4>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      </div>

							      <form method="POST" enctype="multipart/form-data" action="?page=profile&act=changepro">
								      <!-- Modal body -->
								      <div class="modal-body">
								      	Images Profile:
								       	<input type="file" name="profile_img" id="profile_img" class="form-control mb-4">
								      	Firstname:
								       	<input type="text" name="firstname" id="firstname" class="form-control mb-4" placeholder="Firstname" value="<?=$results['firstName'];?>" required>
								       	Lastname:
							            <input type="text" name="lastname" id="lastname" class="form-control mb-4" placeholder="Lastname" value="<?=$results['lastName'];?>" required>
							            Phone Number:
							            <input type="text" name="tel" id="phone" class="form-control mb-4" placeholder="Phone Number" value="<?=$results['tel'];?>" required>
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
		                </div>
	                </div>
	            </div>
    		</div>
			<div class="rows">
				<div class="card gedf-card">
	                <div class="card-header">
	                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
	                        <li class="nav-item">
	                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
	                                a publication</a>
	                        </li>
	                        <li class="nav-item">
	                            <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
	                        </li>
	                    </ul>
	                </div>
	                <div class="card-body">
	                	<form action="?page=profile&act=post" enctype="multipart/form-data" method="POST">
	                    <div class="tab-content" id="myTabContent">
	                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
	                            <div class="form-group">
	                                <label class="sr-only" for="message">post</label>
	                                <textarea class="form-control" id="message" rows="3" name="post" placeholder="What are you thinking?"></textarea>
	                            </div>

	                        </div>
	                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
	                            <div class="form-group">
	                                <div class="custom-file">
	                                    <input type="file" class="custom-file-input" name="img" id="customFile">
	                                    <label class="custom-file-label" for="customFile">Upload image</label>
	                                </div>
	                            </div>
	                            <div class="py-4"></div>
	                        </div>
	                    </div>
	                    <div class="btn-toolbar justify-content-between">
	                        <div class="btn-group">
	                            <button type="submit" class="btn btn-primary">share</button>
	                        </div>
	                    </form>
	                    </div>
	                    <hr>
			<!---- Post ---->
            <?php 
                $post_query = $pdo->prepare("SELECT * FROM posted WHERE owners_id = ".$_SESSION["user_id"]);
                $post_query->execute();
                while ($post = $post_query->fetch(PDO::FETCH_ASSOC)) {
                  $user_query = $pdo->prepare("SELECT * FROM users WHERE id = :email");
                  $user_query->execute(array(":email" => $post['owners_id']));

                  $user = $user_query->fetch(PDO::FETCH_ASSOC);
            echo '
                <div class="rows">
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="images/profile/'.$user['avatar'].'" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0">@'.$user['firstName'].'</div>
                                        <div class="h7 text-muted">'.$user['firstName'].' '.$user['lastName'].'</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                            <div class="h6 dropdown-header">Configuration</div>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Hide</a>
                                            <a class="dropdown-item" href="?page=profile&act=delete&id='.$post['id'].'">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>';  echo date_format(date_create($post['date']),'d/m/Y').'</div>

                            <p class="card-text">
                            '; 
                                if($post['type'] == 'text'){
                                    echo $post['description'];
                                }else{
                                    echo '<img src="images/feed/'.$post['img'].'" width="350">';
                                }
                            echo '</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                        </div>
                    </div>
                </div>
            ';
                }
            ?>
			<!---- Post ---->
	                </div>
	            </div>
			</div>
			<!---- Post Something ---->
    </div>
  </div>
</div>


<?php 

      if(isset($_GET["act"])){
        if($_GET["act"] == "changepro"){
          	if(empty($_FILES ["profile_img"]['name'])){
	            if(empty($_POST["firstname"])){
	              alert('firstname is Null','error','?page=profile');
	            }elseif(empty($_POST["lastname"])) {
	              alert('lastname is Null','error','?page=profile');
	            }elseif(strlen($_POST["tel"]) != 10) {
	              alert('Telephone At Least 10 Characters','error','?page=profile');
	            }else{
	              $update_user = $pdo->prepare("UPDATE users SET firstname = :firstname ,lastname = :lastname ,tel = :tel  WHERE email = :email");
	              $update_user->execute(array(":firstname" => $_POST["firstname"],":lastname" => $_POST["lastname"],":tel" => $_POST["tel"],":email" => $_SESSION["email"]));
	              alert('SuccessFully Updating','success','?page=profile');
	            }
          	}else{
		        $ext = pathinfo(basename($_FILES['profile_img']['name']),PATHINFO_EXTENSION);
		        $new_image_name =  'profile_'.uniqid().'.'.$ext;
		        $image_path = 'images/profile/';
		        $upload_path = $image_path.$new_image_name;
		        $dates = date("Y-m-d");
		        if(move_uploaded_file($_FILES['profile_img']['tmp_name'],$upload_path)){
		            if(empty($_POST["firstname"])){
		              alert('firstname is Null','error','?page=profile');
		            }elseif(empty($_POST["lastname"])) {
		              alert('lastname is Null','error','?page=profile');
		            }elseif(strlen($_POST["tel"]) != 10) {
		              alert('Telephone At Least 10 Characters','error','?page=profile');
		            }else{
		              $update_user = $pdo->prepare("UPDATE users SET avatar = :avatar ,firstname = :firstname ,lastname = :lastname ,tel = :tel  WHERE email = :email");
		              $update_user->execute(array(":avatar" => $new_image_name,":firstname" => $_POST["firstname"],":lastname" => $_POST["lastname"],":tel" => $_POST["tel"],":email" => $_SESSION["email"]));
		              alert('SuccessFully Updating','success','?page=profile');
		            }
	        	}else{
	        		alert('Error Updating','error','?page=profile');
	        	}
        	}
          }
        }
      ?>

  <?php 

      if(isset($_GET["act"])){
        if($_GET["act"] == "changepw"){

          $user_query = $pdo->prepare("SELECT password FROM users WHERE email = :email");
          $user_query->execute(array(":email" => $_SESSION["email"]));

          if($user_query->rowCount()){
            $user = $user_query->fetch(PDO::FETCH_ASSOC);
            if(md5($_POST["old_password"]) != $user["password"]){
              alert('Old Password Incorrect','error','?page=profile');
            }elseif ($_POST["new_password"] != $_POST["con_password"]) {
              alert('Password Not Match','error','?page=profile');
            }elseif(strlen($_POST["new_password"]) < 8) {
              alert('Password At Least 8 Characters','error','?page=profile');
            }elseif (strlen($_POST["con_password"]) < 8) {
              alert('Password At Least 8 Characters','?page=profile');
            }else{
              $update_user = $pdo->prepare("UPDATE users SET password = :new_password WHERE email = :email");
              $update_user->execute(array(":email" => $_SESSION["email"],":new_password" => md5($_POST["new_password"])));
              alert('Password Changed','success','?page=profile');
            }
          }else{
            alert('No Username Information','error','?page=profile'); 
          }
        }
      }
    ?>

    <?php 

      if(isset($_GET["act"])){
        if($_GET["act"] == "post"){
            if(empty($_FILES ["img"]['name'])){
                if(empty($_POST["post"])){
                  alert('post is Null','error','?page=profile');
                }else{
                  $insert_posted = $pdo->prepare("INSERT INTO posted (description,owners_id,date,type) VALUES (:description,:owners_id,:date,:type)");
                  $insert_posted->execute(array(":type" => 'text',":description" => $_POST["post"],":owners_id" => $_SESSION["user_id"],":date" => date("Y-m-d")));
                  alert('SuccessFully Posted!','success','?page=profile');
                }
            }else{
                $ext = pathinfo(basename($_FILES['img']['name']),PATHINFO_EXTENSION);
                $new_image_name =  'feed_'.uniqid().'.'.$ext;
                $image_path = 'images/feed/';
                $upload_path = $image_path.$new_image_name;
                $dates = date("Y-m-d");
                if(move_uploaded_file($_FILES['img']['tmp_name'],$upload_path)){
                      $insert_posted = $pdo->prepare("INSERT INTO posted (img,owners_id,date,type) VALUES (:img,:owners_id,:date,:type)");
                      $insert_posted->execute(array(":type" => 'img',":img" => $new_image_name,":owners_id" => $_SESSION["user_id"],":date" => date("Y-m-d")));
                      alert('SuccessFully Posted!','success','?page=profile');
                }else{
                    alert('Error Updating','error','?page=profile');
                }
            }
          }elseif($_GET["act"] == "delete"){
                  $insert_posted = $pdo->prepare("DELETE FROM posted WHERE id = :id");
                  $insert_posted->execute(array(":id" => $_GET["id"]));
				  alert('Deleted!','success','?page=profile');
		  }
			  
        }
      ?>