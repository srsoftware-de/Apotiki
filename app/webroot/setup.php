<?php

$currentVersion = 1;

function form(){
	echo "Welcome to the Inventary Software Setup! Please enter credentials here:\n";
	echo "<br />\n";
	echo "<br />\n";
	echo '<form action="setup.php" method="POST">'."\n";
	echo 'Database Hostname:<input type="text" name="host" id="host" value="localhost" /><br />'."\n";
	echo 'Database Name:<input type="text" name="database" id="database" value="inventary" /><br />'."\n";
	echo 'Database User	Name:<input type="text" name="user" id="user" value="srsoftware" /><br />'."\n";
	echo 'Database Password:<input type="password" name="pass" id="pass" /><br />'."\n";
	echo '<input type="submit" value="Save" />'."\n";
	echo "</form>\n";
}

function error($msg){
	echo '<div style="background: orange;">'.$msg."</div>\n";
}

function versionFile(){
	return dirname(getcwd())."/version";
}

function dbConfigFile(){
	return dirname(getcwd())."/Config/database.php";
}


function upgrade(){	
	global $currentVersion;
	$conn=connectToExistingDB();
	if (!$conn) return;
	
	$oldVersion=0;
	if (file_exists(versionFile())){
		$oldVersion=file_get_contents(versionFile());
	}
	for ($step=$oldVersion+1; $step <= $currentVersion; $step++){
		switch ($step){
			case 1:
				mysql_query("CREATE TABLE openids (identity VARCHAR(150) NOT NULL PRIMARY KEY, user_id INT NOT NULL)");				
				break;
		}
	}
	echo "Update finished!";	
	updateVersionFile();
	header('Refresh: 3; url=.');
}

function connectToExistingDB(){
	require(dbConfigFile());
	$dbconfig=new DATABASE_CONFIG();
	$dbconfig=$dbconfig->default;
	$connection=@mysql_connect($dbconfig['host'],$dbconfig['login'],$dbconfig['password']);
	if (!$connection){
		error('Was not able to connect to the given database server!');
		form();
	} else {
		if (mysql_select_db($dbconfig['database'],$connection)){
			return $connection;
		} else {
			error('Was able to connect to the database server, but could not open the database!');
			form();
		}
	}
}

function updateVersionFile(){
	global $currentVersion;
	file_put_contents(versionFile(), $currentVersion);	
}

function alreadyInstalled(){
	return file_exists(dbConfigFile());
}

function runSetup(){
	global $currentVersion;
	
	$host=$_POST['host'];
	$dbas=$_POST['database'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$connection=@mysql_connect($host,$user,$pass);
	if (!$connection){
		error('Was not able to connect to the given database server!');
		form();
	} else {
		if (mysql_select_db($dbas,$connection)){
			mysql_query("CREATE TABLE attributes (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50));");
			mysql_query("CREATE TABLE events (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, description TEXT NOT NULL, item_id INT NOT NULL, user_id INT NOT NULL);");
			mysql_query("CREATE TABLE item_places (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, place_id INT NOT NULL, item_id INT NOT NULL, count INT NOT NULL);");
			mysql_query("CREATE TABLE items (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name TEXT NOT NULL, erased BOOLEAN DEFAULT FALSE);");
			mysql_query("CREATE TABLE places (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, description TEXT NOT NULL, place_id INT);");
			mysql_query("CREATE TABLE properties (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, attribute_id INT NOT NULL, value TEXT NOT NULL, item_id INT NOT NULL);");
			mysql_query("CREATE TABLE uploads (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name TEXT NOT NULL, path TEXT NOT NULL, item_id INT NOT NULL, type VARCHAR(20));");
			mysql_query("CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, user_id INT NOT NULL, name TEXT NOT NULL);");
			mysql_query("CREATE TABLE builtins (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, item_id INT NOT NULL, amount INT NOT NULL, included_item_id INT NOT NULL);");
			mysql_query("CREATE TABLE openids (identity VARCHAR(150) NOT NULL PRIMARY KEY, user_id INT NOT NULL)");
				
			$dir=getcwd();
			$pos = strrpos($dir, "webroot");
			if ($pos !== false) $dir = substr_replace($dir, "", $pos, strlen("webroot"));
			if (($dir[strlen($dir)-1])!='/') $dir.='/';
			$filename=$dir.'Config/database.php';
			$file=@fopen($filename,"w");
			if ($file){
				fwrite($file,"<?php\n");
				fwrite($file,"class DATABASE_CONFIG {\n");
				fwrite($file,"\tpublic \$default = array(\n");
				fwrite($file,"\t\t'datasource' => 'Database/Mysql',\n");
				fwrite($file,"\t\t'persistent' => false,\n");
				fwrite($file,"\t\t'host' => '".$host."',\n");
				fwrite($file,"\t\t'login' => '".$user."',\n");
				fwrite($file,"\t\t'password' => '".$pass."',\n");
				fwrite($file,"\t\t'database' => '".$dbas."',\n");
				fwrite($file,"\t\t'prefix' => '',\n");
				fwrite($file,"\t);\n");
				fwrite($file,"}\n");
				fclose($file);
				mkdir($dir."tmp/cache/persistent",0777,true);
				mkdir($dir."tmp/cache/models",0777,true);
				mkdir($dir."tmp/cache/logs",0777,true);
				updateVersionFile();
				header("Location: .");
			} else {
				error('Was able to connect to the database server, but could not write to Config/database.php! Make sure to give the right permissions!');
				form();
			}
		} else {
			error('Was able to connect to the database server, but could not open the database!');
			form();
		}
	}
} ?>
<html>
<head>
<title>Setup</title>
</head>
<body>
	<?php
	if (alreadyInstalled()){
		upgrade();
	} else {
		if (isset($_POST['database'])){
			runSetup();
		} else {
			form();
			}
	} ?>
</body>
</html>
