<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'App';

$route['question/start'] = 'question/start';
$route['question/finish'] = 'question/finish';
$route['question/saved'] = 'question/saved';
$route['question/answer/(:any)'] = 'question/answer/$1';
$route['question/(:any)'] = 'question/index/$1';

$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = TRUE;