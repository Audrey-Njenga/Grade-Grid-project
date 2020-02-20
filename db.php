<?php

$dbhost = 'localhost';
$dbuname = 'debian-sys-maint';
$dbpass = 'TY5chDgwy4z6jVdp';
$dbname = 'gradegrid';

$dbconn = mysqli_connect($dbhost, $dbuname, $dbpass, $dbname);

if (!$dbconn) {
    die("Connection did not happen " .mysqli_connect_error());
}
?>

