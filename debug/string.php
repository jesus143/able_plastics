<?php
/**
 * Created by PhpStorm.
 * User: JESUS
 * Date: 6/27/2016
 * Time: 5:05 PM
 */

echo "state = " . stateRename('');

function stateRename($state) {

    $state = str_replace('_', ' ', $state);
    $state = strtolower($state);


    switch ($state) {
        case 'new south wales':
            $state = 'NSW';
            break;
        case 'south australia':
            $state = 'SA';
            break;
        case 'queensland':
            $state = 'SA';
            break;
        case 'northern territory':
            $state = 'NT';
            break;
        case 'Western Australia':
            $state = 'WA';
            break;
        case 'Tasmania':
            $state = 'Tas';
            break;
        case 'Australian Capital Territory':
            $state = 'ACT';
            break;
        default:
            break;
    }

}