<?php
$hostname_db = "localhost";
$database_db = "alr";
$username_db = "postgres";
$password_db = "TRF2cn2010";

$pgdb = pg_connect("host=$hostname_db user=$username_db password=$password_db dbname=$database_db") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'");

?>