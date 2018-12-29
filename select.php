<?php
$host        = "host=127.0.0.1";
$port        = "port=5432";
$dbname      = "dbname=testdb";
$credentials = "user=postgres password=123456";

$db = pg_connect( "$host $port $dbname $credentials"  );
if(!$db){
	echo "Error : Unable to open database\n";
} else {
	echo "Opened database successfully\n";
}

$sql =<<<EOF
      SELECT * from COMPANY;
EOF;

$ret = pg_query($db, $sql);
if(!$ret){
	echo pg_last_error($db);
	exit;
}
while($row = pg_fetch_row($ret)){
	echo "ID = ". $row[0] . "\n";
	echo "NAME = ". $row[1] ."\n";
	echo "ADDRESS = ". $row[2] ."\n";
	echo "SALARY =  ".$row[4] ."\n\n";
}
echo "Operation done successfully\n";
pg_close($db);
?>