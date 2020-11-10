<?php 
try {
	$pdo = new PDO( 
	    'mysql:host='.$config["setting"]["host"]["host_name"].';dbname='.$config["setting"]["host"]["host_database"], 
	    $config["setting"]["host"]["host_user"], 
	    $config["setting"]["host"]["host_password"], 
	    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") 
	);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function base_url($path){	
	$url["base_url"] = $config["setting"]["website"]["website_url"];
	return $url["base_url"].$path;
}