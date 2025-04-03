<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 		= 'home';

$route['admin'] 				    = 'admin/login';

/* Application Routes */
$route['admin/add-application'] 				= 'manageApplication/add_application';
$route['admin/manage-application'] 				= 'manageApplication/manage_application';
$route['admin/edit-application/(.+)'] 			= 'manageApplication/edit_application/$1';
$route['admin/manage-archive-application'] 		= 'manageApplication/manage_archive_application';

/* Construction Routes */
$route['admin/add-construction'] 				= 'manageConstruction/add_construction';
$route['admin/manage-construction'] 			= 'manageConstruction/manage_construction';
$route['admin/edit-construction/(.+)'] 			= 'manageConstruction/edit_construction/$1';

/* POWER RATING Routes */
$route['admin/add-power-rating'] 				= 'powerRating/add_power_rating';
$route['admin/manage-power-rating'] 			= 'powerRating/manage_power_rating';
$route['admin/edit-power-rating/(.+)'] 			= 'powerRating/edit_power_rating/$1';

/* Series Routes */
$route['admin/add-product-series'] 				= 'manageProductSeries/add_product_series';
$route['admin/manage-product-series'] 			= 'manageProductSeries/manage_product_series';
$route['admin/edit-product-series/(.+)'] 		= 'manageProductSeries/edit_product_series/$1';

/* PRODUCT Routes */
$route['admin/add-product'] 					= 'manageProduct/add_product';
$route['admin/manage-product'] 					= 'manageProduct/manage_product';
$route['admin/edit-product/(.+)'] 				= 'manageProduct/edit_product/$1';
$route['admin/manage-archive-product'] 			= 'manageProduct/manage_archive_product';

$route['admin/add-event'] 						= 'manageEvent/add_event';
$route['admin/manage-event'] 					= 'manageEvent/manage_event';
$route['admin/edit-event/(.+)'] 				= 'manageEvent/edit_event/$1';

$route['admin/add-slider'] 						= 'manageSlider/add_slider';
$route['admin/manage-slider'] 					= 'manageSlider/manage_slider';
$route['admin/edit-slider/(.+)'] 				= 'manageSlider/edit_slider/$1';

$route['admin/manage-lead'] 					= 'manageLead/manage_lead';
$route['admin/view-lead/(.+)'] 					= 'manageLead/view_lead/$1';

$route['admin/manage-quotation'] 					= 'manageQuotation/manage_quotation';
$route['admin/view-quotation/(.+)'] 					= 'manageQuotation/view_quotation/$1';

$route['admin/add-contact'] 					= 'admin/add_contact';

$route['admin/add-client'] 						= 'manageClient/add_client';
$route['admin/manage-client'] 					= 'manageClient/manage_client';
$route['admin/edit-client/(.+)'] 				= 'manageClient/edit_client/$1';


//FRONT END

$route['about-us'] 								= 'home/about';
$route['contact-us'] 							= 'home/contact';
$route['request-quote'] 						= 'quote/index';
$route['terms'] 								= 'home/terms';
$route['privacy-policy'] 						= 'home/privacy_policy';
$route['applications'] 						= 'home/application_list';
$route['view-application/(:any)'] 				= 'home/view_application/$1';
$route['product'] 								= 'home/series';
$route['product/(:any)'] 						= 'home/product/$1';
$route['product/(:any)/(:any)'] 				= 'home/product_detail/$1/$2';

$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;
// $route['(:any)']				= 'Home/page_not_found';
$route['404_override'] = 'Home/page_not_found';
