<?php

mysql_connect('localhost', 'root', 'mysql');

mysql_query("DROP DATABASE IF EXISTS test") or die(mysql_error());
mysql_query("CREATE DATABASE test") or die(mysql_error());

mysql_select_db("test") or die(mysql_error());

mysql_query("DROP TABLE IF EXISTS ABSENCES") or die(mysql_error());

mysql_query("CREATE TABLE ABSENCES (
  id mediumint NOT NULL AUTO_INCREMENT,
  pseudo varchar(255) NOT NULL,
  timestamp_D DATE NOT NULL,
  timestamp_R DATE NOT NULL,
  raison varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=`InnoDB`") or die(mysql_error());

echo "OK !";
?>

<meta http-equiv="refresh" content="2; url=index.php" />