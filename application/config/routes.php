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


// Custom Routes
//------------User Routes---------------
$route['api/user/getUserList']['post'] = 'User/getUserList';
$route['api/user/search']['post'] = 'User/search';
$route['api/user/login']['post'] = 'User/login';
$route['api/user/register']['post'] = 'User/register';
$route['api/user/update']['post'] = 'User/update';
$route['api/user/add']['post'] = 'User/add';
$route['api/user/delete']['post'] = 'User/delete';

//------------Building Routes---------------
$route['api/building/getList']['post'] = 'Building/getList';
$route['api/building/getListWithUnit']['post'] = 'Building/getListWithUnit';
$route['api/building/search']['post'] = 'Building/search';
$route['api/building/add']['post'] = 'Building/add';
$route['api/building/update']['post'] = 'Building/update';
$route['api/building/delete']['post'] = 'Building/delete';

//------------Apartment Routes---------------
$route['api/apartment/getList']['post'] = 'Apartment/getList';
$route['api/apartment/add']['post'] = 'Apartment/add';
$route['api/apartment/update']['post'] = 'Apartment/update';
$route['api/apartment/delete']['post'] = 'Apartment/delete';

//------------Noc Move Routes---------------
$route['api/move/getList']['post'] = 'Movement/getList';
$route['api/move/getIssuesReply']['post'] = 'Movement/getIssuesReply';
$route['api/move/add']['post'] = 'Movement/add';
$route['api/move/outAdd']['post'] = 'Movement/outAdd';
$route['api/move/updateMoveOut']['post'] = 'Movement/updateMoveOut';
$route['api/move/maintenanceAdd']['post'] = 'Movement/maintenanceAdd';
$route['api/move/maintenacneUpdate']['post'] = 'Movement/maintenacneUpdate';
$route['api/move/update']['post'] = 'Movement/update';
$route['api/move/updateMoveIn']['post'] = 'Movement/updateMoveIn';
$route['api/move/reject']['post'] = 'Movement/reject';
$route['api/move/delete']['post'] = 'Movement/delete';

//------------Maintenances Routes---------------
$route['api/maintenances/getList']['post'] = 'Maintenances/getList';
$route['api/maintenances/add']['post'] = 'Maintenances/add';
$route['api/maintenances/update']['post'] = 'Maintenances/update';
$route['api/maintenances/delete']['post'] = 'Maintenances/delete';

//------------Notify Routes---------------
$route['api/notify/getList']['post'] = 'Notify/getList';
$route['api/notify/getDetailList']['post'] = 'Notify/getDetailList';
$route['api/notify/add']['post'] = 'Notify/add';
$route['api/notify/addDetail']['post'] = 'Notify/addDetail';
$route['api/notify/update']['post'] = 'Notify/update';
$route['api/notify/delete']['post'] = 'Notify/delete';

//------------Messages Routes---------------
$route['api/messages/getList']['post'] = 'Messages/getList';
$route['api/messages/getDetailList']['post'] = 'Messages/getDetailList';
$route['api/messages/add']['post'] = 'Messages/add';
$route['api/messages/addDetail']['post'] = 'Messages/addDetail';
$route['api/messages/update']['post'] = 'Messages/update';
$route['api/messages/delete']['post'] = 'Messages/delete';

//------------Units Routes---------------
$route['api/unit/getList']['post'] = 'Unit/getList';
$route['api/unit/add']['post'] = 'Unit/add';
$route['api/unit/update']['post'] = 'Unit/update';
$route['api/unit/delete']['post'] = 'Unit/delete';

//------------Owner Routes---------------
$route['api/userowner/getList']['post'] = 'Owner/getList';
$route['api/userowner/add']['post'] = 'Owner/add';
$route['api/userowner/delete']['post'] = 'Owner/delete';
$route['api/userowner/update']['post'] = 'Owner/update';


//------------Other Routes---------------
$route['api/import/excel']['post'] = 'Home/importExcel';
$route['api/import/building_excel']['post'] = 'Home/importBuildingExcel';
$route['api/import/unit_excel']['post'] = 'Home/importUnitExcel';
$route['api/generate/excel']['get'] = 'Home/generateExcel';
$route['api/download']['get'] = 'Home/download';

$route['default_controller'] = 'admin/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;