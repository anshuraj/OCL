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
$route['default_controller'] = 'homepage';
$route['account'] = 'Account';
$route['account/signup'] = 'Account/signup';
$route['account/login'] = 'Account/login';
$route['account/logout'] = 'Account/logout';
$route['catalog'] = 'Catalog';
$route['course/(:num)'] = 'Course/index/$1';
$route['course/enroll'] = 'Course/enroll';
$route['dashboard'] = 'Dashboard';
$route['classroom/(:num)/(:num)'] = 'Classroom/index/$1/$2';
$route['classroom/test/(:num)'] = 'Test/index/$1';
$route['classroom/test/save'] = 'Test/saveTestScore';

$route['classroom/assign/(:num)'] = 'Assign/index/$1';

$route['teacher'] = 'teacher/dashboard';
$route['teacher/create'] = 'teacher/create';
$route['teacher/createCourse'] = 'teacher/create/createCourse';
$route['teacher/update/(:num)'] = 'teacher/update/index/$1';
$route['teacher/update/upload'] = 'teacher/update/upload';
$route['teacher/update/addtest'] = 'teacher/update/addTest';
$route['teacher/update/addtestques/(:num)'] = 'teacher/addtestques/index/$1';
$route['teacher/update/addtestques/add'] = 'teacher/addtestques/add';
$route['teacher/update/addassign'] = 'teacher/update/addAssign';
$route['teacher/update/addassignques/(:num)'] = 'teacher/addassignques/index/$1';
$route['teacher/update/addassignques/add'] = 'teacher/addassignques/add';


$route['forum'] = 'forum/discuss';
$route['forum/thread/reply'] = 'forum/thread/reply';
$route['forum/thread/(:num)'] = 'forum/thread/index/$1';
$route['forum/new'] = 'forum/create';
$route['forum/new/createthread'] = 'forum/create/createThread';

$route['profile'] = 'profile';
$route['profile/changepass'] = 'profile/changePassword';
$route['profile/remove/(:num)'] = 'profile/removeEnrollment/$1';
$route['report/(:num)'] = 'report/index/$1';
 
$route['admin'] = 'admin';
$route['admin/createteacher'] = 'Admin/createTeacherAccount';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
