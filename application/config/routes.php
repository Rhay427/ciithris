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
$route['forgot'] = 'pages/forgot';
$route['login']['POST'] = 'pages/login';
$route['home'] = 'pages/home';
$route['changepassword'] = 'pages/changepassword';

$route['manage_admin']['GET'] = 'pages/manage_admin';
$route['insertadmin'] = 'pages/addnewadmin';
$route['insertaccess'] = 'pages/insertaccess';
$route['updateaccess'] = 'pages/updateaccess';
$route['fetchaccess'] = 'pages/fetchaccess';
$route['deleteaccess'] = 'pages/deleteaccess';

$route['empManagement']['GET'] = 'empmanage/empManagement';
$route['empSearch'] = 'empmanage/empSearch';
$route['empAdd']['GET'] = 'empmanage/empAdd';
$route['empAdd']['POST'] = 'empmanage/addNew';
$route['updateJob']['GET'] = 'empmanage/updateJob';
$route['updateJob']['POST'] = 'empmanage/jobupdate';
$route['updateSalary']['GET'] = 'empmanage/updateSalary';
$route['updateSalary']['POST'] = 'empmanage/salaryupdate';
$route['showEmployee'] = 'empmanage/showEmployee';
$route['showRequest'] = 'empmanage/showRequest';
$route['fetchemailrequest'] = 'empmanage/fetchemailrequest';
$route['approverequest'] = 'empmanage/approverequest';
$route['showInactive']['GET'] = 'empmanage/showInactive';
$route['fetchinactive'] = 'empmanage/fetchinactive';
$route['reactivate'] = 'empmanage/reactivate';

$route['homeAnnouncements']['GET'] = 'announcemanage/homeAnnouncements';
$route['searchAnnounce'] = 'announcemanage/searchAnnounce';
$route['viewAnnounce']['GET'] = 'announcemanage/viewAnnounce';
$route['viewAnnounce']['POST'] = 'announcemanage/editAnnounce';
$route['insertannounce'] = 'announcemanage/insertannounce';
$route['deleteAnnounce']['POST'] = 'announcemanage/deleteAnnounce';

$route['mailManagement']['GET'] = 'mailmanage/mailManagement';
$route['viewMail']['GET'] = 'mailmanage/viewMail';
$route['viewMail']['POST'] = 'mailmanage/respondMail';
$route['respondedMail']['GET'] = 'mailmanage/respondedMail';
$route['viewResponded']['GET'] = 'mailmanage/viewResponded';
$route['email'] = 'mailmanage/send_mail';

$route['recruithome']['GET'] = 'recruitcontroller/recruithome';
$route['showrecruit']['GET'] = 'recruitcontroller/showrecruit';
$route['fetchrecruit'] = 'recruitcontroller/fetchrecruit';
$route['insertschedule'] = 'recruitcontroller/insertschedule';
$route['showschedules']['GET'] = 'recruitcontroller/showschedules';
$route['fetchschedules'] = 'recruitcontroller/fetchschedules';
$route['setdone'] = 'recruitcontroller/setdone';

$route['resignhome']['GET'] = 'resigncontroller/resignhome';

$route['attendancehome']['GET'] = 'attendancecontroller/attendancehome';

$route['payrollhome']['GET'] = 'payrollcontroller/payrollhome';
$route['payroll_create']['GET'] = 'payrollcontroller/payroll_create';
$route['payroll_create']['POST'] = 'payrollcontroller/payrollAdd';
$route['getemployeedetails'] = 'payrollcontroller/fetchEmployee';
$route['deletepayroll'] = 'payrollcontroller/deletepayroll';

$route['leaveManagement']['GET'] = 'leavemanage/leaveManagement';
$route['manageapproved']['GET'] = 'leavemanage/manageapproved';
$route['managecancelled']['GET'] = 'leavemanage/managecancelled';
$route['assigncredits']['GET'] = 'leavemanage/managecredits';
$route['fetchempcred'] = 'leavemanage/fetchempcred';
$route['submitcredits'] = 'leavemanage/submitcredits';
$route['fetchpending'] = 'leavemanage/fetchpending';
$route['fetchapproved'] = 'leavemanage/fetchapproved';
$route['fetchcancelled'] = 'leavemanage/fetchcancelled';


$route['default_controller'] = 'pages/login';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
