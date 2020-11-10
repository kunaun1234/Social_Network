
<!-- navbar -->
<?php require_once (__DIR__).("/../object/member_navbar.php");?>




<!-- home code -->
<div class="container" style="margin-top: 30px">
	<div class="row">
		<div class="col-lg-9">

			<!---- Post Something ---->
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
                        <form action="?page=home&act=post" enctype="multipart/form-data" method="POST">
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
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </form>
	                        <div class="btn-group">
	                            <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
	                                aria-expanded="false">
	                                <i class="fa fa-globe"></i>
	                            </button>
	                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
	                                <a class="dropdown-item disabled" href="#"><i class="fa fa-globe"></i> Public <small>(Comming Soon)</small></a>
	                                <a class="dropdown-item disabled" href="#"><i class="fa fa-users"></i> Friends <small>(Comming Soon)</small></a>
	                                <a class="dropdown-item disabled" href="#"><i class="fa fa-user"></i> Just me <small>(Comming Soon)</small></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
			</div>
			<!---- Post Something ---->

			<!---- Post ---->
            <?php 
                $post_query = $pdo->prepare("SELECT * FROM posted ORDER BY id DESC");
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
                                            <div class="h6 dropdown-header">Setting</div>
                                            <a class="dropdown-item disabled" href="#">Delete <small>(Comming Soon)</small></a>
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
                                    echo '<a target="_blank" href="images/feed/'.$post['img'].'"><img src="images/feed/'.$post['img'].'" width="350"></a>';
                                }
                            echo '</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link"><i class="fas fa-thumbs-up"></i> Like <small>(Comming Soon)</small></a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment <small>(Comming Soon)</small></a>
                        </div>
                    </div>
                </div>
            ';
                }
            ?>
			<!---- Post ---->

		</div>
		<div class="col-lg-3">
			<div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="h5">Online Friend</div>
                        <?php 
                              $user_query = $pdo->prepare("SELECT * FROM users");
                              $user_query->execute();
                              while($users = $user_query->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="h6 text-muted">
                                '.$users['firstName'].' '.$users['lastName']; 
                                if($users['session_login'] == 1){
                                    echo'<small style="color: green">(Online)</small>';
                                }else{
                                    echo'<small style="color: red">(offline)</small>';
                                }
                                echo '</div>';
                            }
                        ?>
                    </li>
                </ul>
            </div>
		</div>
	</div>
</div>

<?php 

      if(isset($_GET["act"])){
        if($_GET["act"] == "post"){
            if(empty($_FILES ["img"]['name'])){
                if(empty($_POST["post"])){
                  alert('post is Null','error','?page=home');
                }else{
                  $insert_posted = $pdo->prepare("INSERT INTO posted (description,owners_id,date,type) VALUES (:description,:owners_id,:date,:type)");
                  $insert_posted->execute(array(":type" => 'text',":description" => $_POST["post"],":owners_id" => $_SESSION["user_id"],":date" => date("Y-m-d")));
                  alert('SuccessFully Posted!','success','?page=home');
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
                      alert('SuccessFully Posted!','success','?page=home');
                }else{
                    alert('Error Updating','error','?page=home');
                }
            }
          }
        }
      ?>