<?php 

///===============================================================
$config["setting"]["host"] = array(
	"host_name" => 'localhost',
	"host_user" => 'root',
	"host_password" => '',
	"host_database" => 'social2',
);

//===============================================================

$config["setting"]["website"] = array(
	"website_url" => 'http://154.16.11.236/Social_network',
	"website_title" => 'Social Network',
	"website_title_member" => 'Social Network : Member',
	"website_version" => '1.0',
);

//===============================================================

function alert($alert = "",$type = "",$target = ""){
	echo '
			<script>
				swal({
					title: "Alert",
					text: "'.$alert.'",
						type: "'.$type.'",
						confirmButtonText: "OK"
					},
					function(isConfirm){
						if (isConfirm) {
						    window.location.href = "'.$target.'";
						}
					});
			</script>
		'
	;
}