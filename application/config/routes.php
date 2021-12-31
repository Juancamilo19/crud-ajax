<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'Welcome/index';
$route['insert'] = 'Welcome/insert';
$route['fetch'] = 'Welcome/fetch';
$route['delete'] = 'Welcome/delete';
$route['edit'] = 'Welcome/edit';
$route['update'] = 'Welcome/update';
