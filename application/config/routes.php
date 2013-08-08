<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']            = "journal/index";
// Journal Routes
$route['journal/']                      = 'journal/index';
$route['journal/new']                   = 'journal/create_edit';
$route['journal/edit/(:num)']           = 'journal/create_edit/$1';
$route['journal/delete/(:num)']         = 'journal/delete/$1';
$route['journal/json/(:any)/(:num)']    = 'journal/json/$1/$2';

// Account Routes
$route['account/']                      = 'account/index';
$route['account/new']                   = 'account/create_edit';
$route['account/edit/(:num)']           = 'account/create_edit/$1';
$route['account/delete/(:num)']         = 'account/delete/$1';
$route['account/json/(:any)/(:num)']    = 'account/json/$1/$2';
// Contact Routes
$route['contact/']                      = 'contact/index';
$route['contact/new']                   = 'contact/create_edit';
$route['contact/edit/(:num)']           = 'contact/create_edit/$1';
$route['contact/delete/(:num)']         = 'contact/delete/$1';
$route['contact/json/(:any)/(:num)']    = 'contact/json/$1/$2';
// Report Routes
$route['report/']                       = 'report/index';
// Other Routes
$route['404_override']                  = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */