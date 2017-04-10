<?php

  if (file_exists('count.txt')) 
  {
    $fil = fopen('count.txt', 'r');
    $dat = fread($fil, filesize('count.txt')); 
    echo $dat+1;
    fclose($fil);
    $fil = fopen('count.txt', 'w');
    fwrite($fil, $dat+1);
  }

  else
  {
    $fil = fopen('count.txt', 'w');
    fwrite($fil, 1);
    echo '1';
    fclose($fil);
  }
?>