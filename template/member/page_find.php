
<!-- navbar -->
<?php require_once (__DIR__).("/../object/member_navbar.php");?>

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
<script>
	function clicks(){
		window.location.href="?page=find&keyword=" + $("#find").val();
	};
</script>
<!-- home code -->
<div class="container" style="margin-top: 30px">
  <div class="row">

    <div class="col-lg-12">
    		<div class="rows" style="margin-bottom: 20px">
<div class="row">
	<div class="col-sm-3" style="float: right;">
			<input id="find" type="text" class="form-control">
</div>
	<div class="col-sm-3" style="float: right;">
			<button onclick="javascript: clicks();" id="btn_sreach" class="btn btn-success btn-xs" type="submit">ค้นหา</button>
</div>
</div>
<hr>
    			<div class="card">
				<?php 
					if(!empty($_GET["keyword"])){
						$user_query = $pdo->prepare("SELECT * FROM users WHERE firstName LIKE '".$_GET["keyword"]."' OR lastName LIKE '".$_GET["keyword"]."'");
					}else{
						$user_query = $pdo->prepare("SELECT * FROM users");
					}
                  $user_query->execute();
                  while($user = $user_query->fetch(PDO::FETCH_ASSOC)){
	                echo '<div class="row">
	                	<div class="col-lg-1 col-sm-6">
		                	<img src="images/profile/'.$user['avatar'].'" width="80" height="80" class="rounded-circle">
		                </div>
		                <div class="col-lg-11 col-sm-6">
		                	<h5 style="position: absolute; bottom: 10px">
		                		'.$user['firstName'].' '.$user['lastName'].'
		                	</h5>
		                </div>
	                </div>';}?>
					
					<hr>
	            </div>

    		</div>
    </div>
  </div>
</div>
