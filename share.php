<?php

 $s_penelitian = strtotime('2018-01-17 00:00:00');
    $e_penelitian = strtotime('2019-01-16 00:00:00');

    $s_semester   = strtotime('2018-09-01 00:00:00');
    $e_semester   = strtotime('2019-01-31 00:00:00');

    if(($s_penelitian <= $s_semester || $s_penelitian >= $s_semester) && ($e_penelitian <= $e_semester || $e_penelitian >= $e_semester) && ($e_penelitian >= $s_semester) && ($s_penelitian <= $e_semester)){
    	$masuk = 'masuk';
    }else{
    	$masuk = 'tidak masuk';
    }

    echo $masuk;

?>



//CRUD

#JAVASCRIPT :

