<?php

print_r($_SERVER['HTTP_HOST']);
echo '<br>';
$tekst = "prog2.ste-ch.pl";
$test = $_SERVER['HTTP_HOST'];

if($tekst === $test)
{
     echo "poprawnie";
}

else
{
     echo "lipa";
}

?>