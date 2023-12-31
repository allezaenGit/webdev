<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['post_controller_constructor'][] = array(
        'class'    => 'LogActivity',
        'function' => 'activity',
        'filename' => 'LogActivity.php',
        'filepath' => 'hooks',
);
$hook['post_controller_constructor'][]= array(
        'class'    => 'Maintenance',
        'function' => 'check',
        'filename' => 'Maintenance.php',
        'filepath' => 'hooks',
);

$hook['post_controller_constructor'][]= array(
        'class'    => 'PreRequest',
        'function' => 'pre',
        'filename' => 'PreRequest.php',
        'filepath' => 'hooks',
);

$hook['post_controller_constructor'][]= array(
        'class'    => 'FileUpload',
        'function' => 'prePost',
        'filename' => 'FileUpload.php',
        'filepath' => 'hooks',
);




