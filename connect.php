<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('webproje');
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
?>