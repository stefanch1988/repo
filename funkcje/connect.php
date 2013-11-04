<?php

define("HOST", "localhost");
define("USER", "ste_ch4");
define("PASS", "koder1988");
define("DATABASE", "ste_ch4");

$id=mysql_connect(HOST, USER, PASS)or die("POŁ");
mysql_select_db(DATABASE)or die("DB");
mysql_set_charset('utf8');

?>
