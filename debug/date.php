<?php
/**
 * Created by PhpStorm.
 * User: JESUS
 * Date: 6/23/2016
 * Time: 3:57 PM
 */

 $string = '2016-06-23';




echo ' - ' . strpos($string, '-'); // 4
echo ' : ' . strpos($string, ':'); // 13
echo ' T ' . strpos($string, 'T'); // 10

if(strpos($string, '-') == 4 and strpos($string, ':') == 13 and strpos($string, 'T') == 10) {
    echo "This should be a date\n";
} else {
    echo "This should not be a date\n";
}