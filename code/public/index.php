<?php

echo '<p>PHP is running</p>';

$mysql_hostname = 'db';
$mysql_username = 'mysql';
$mysql_password = 'mysql';
$mysql_db = 'appdatabase';

$conn = mysqli_connect ($mysql_hostname, $mysql_username, $mysql_password, $mysql_db);
if($conn) {
    echo '<p>DB-Connection: Success</p>';
} else {
    echo '<p>DB-Connection: <strong>Failed</strong></p>';
    echo '<p><strong>HINT: </strong>Restart the db-container if this is the first time (the container cant rewire the new db that is instanced on the fly)</p>';
}