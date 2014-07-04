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

$route['default_controller'] = "home";
$route['clientes'] = "clientes";
$route['stock'] = "articulos";
$route['facturar'] = "facturar";
$route['banco'] = "banco";
$route['seguro'] = "seguro";
$route['vehiculos'] = "vehiculos";
$route['articulos'] = "articulos";
$route['departamentos'] = "departamentos";
$route['cargos'] ="cargos";
$route['administracion'] = "vehiculos/cargarGestionVehiculos";
$route['facturar/factura_pdf/(:num)'] = "facturar/factura_pdf/$1";
$route['facturar/licencia_pdf/(:num)'] = "facturar/licencia_pdf/$1";
$route['facturar/estado_pdf/(:num)'] = "facturar/estado_pdf/$1";
$route['vehiculos/calcomania_pdf/(:num)'] = "vehiculos/calcomania_pdf/$1";
$route['clientes/facturasCliente/(:any)'] = "clientes/facturasCliente/$1";
//$route['stock'] = "stock/traerVehiculo";
$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */
