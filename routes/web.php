 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function() {
   Route::get('/login','Login\LoginController@login');
   Route::post('/auth/login', ['as' => 'auth.login', 'uses' => 'Login\LoginController@postLogin']);
   Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Login\LoginController@getLogout']);
   Route::get('/admin', ['as' => 'admin', 'uses'=>'Admin\AdminController@admin']);
     /*usuario route*/
    Route::get('usuario/new',['as' => 'usuario.new','uses'=>'Usuario\UsuarioController@nuevo']);
     Route::post('usuario/create', ['as' => 'usuario.create', 'uses' => 'Usuario\UsuarioController@create']);
     Route::get('usuario/{id}/edit', ['as' => 'usuario.edit', 'uses' => 'Usuario\UsuarioController@edit']);
     Route::get('usuario/index', ['as' => 'usuario.index', 'uses' => 'Usuario\UsuarioController@index']);
     Route::put('usuario/{id}', ['as' => 'usuario.update', 'uses' => 'Usuario\UsuarioController@update']);
     Route::get('usuario/{id}/show', ['as' => 'usuario.show', 'uses' => 'Usuario\UsuarioController@show']);
     Route::delete('usuario/{id}/destroy', ['as' => 'usuario.destroy', 'uses' => 'Usuario\UsuarioController@destroy']);
   Route::get('usuario/search', ['as' => 'usuario.search', 'uses' => 'Usuario\UsuarioController@search']);
    /*usuario register route*/
     Route::post('usuario-reg/create', ['as' => 'usuario-reg.create', 'uses' => 'Usuario\UsuarioRegisterController@create']);
     Route::get('usuario-reg/{id}/edit', ['as' => 'usuario-reg.edit', 'uses' => 'Usuario\UsuarioRegisterController@edit']);
     Route::get('usuario-reg/index', ['as' => 'usuario-reg.index', 'uses' => 'Usuario\UsuarioRegisterController@index']);
     Route::put('usuario-reg/{id}', ['as' => 'usuario-reg.update', 'uses' => 'Usuario\UsuarioRegisterController@update']);
     Route::get('usuario-reg/{id}/show', ['as' => 'usuario-reg.show', 'uses' => 'Usuario\UsuarioRegisterController@show']);
     Route::delete('usuario-reg/{id}/destroy', ['as' => 'usuario-reg.destroy', 'uses' => 'Usuario\UsuarioRegisterController@destroy']);
   Route::get('usuario-reg/search', ['as' => 'usuario-reg.search', 'uses' => 'Usuario\UsuarioRegisterController@search']);
     /*area route*/
    Route::get('area/new',['as' => 'area.new','uses'=>'Area\AreaController@nuevo']);
     Route::post('area/create', ['as' => 'area.create', 'uses' => 'Area\AreaController@create']);
     Route::get('area/{id}/edit', ['as' => 'area.edit', 'uses' => 'Area\AreaController@edit']);
     Route::get('area/index', ['as' => 'area.index', 'uses' => 'Area\AreaController@index']);
     Route::put('area/{id}', ['as' => 'area.update', 'uses' => 'Area\AreaController@update']);
     Route::get('area/{id}/show', ['as' => 'area.show', 'uses' => 'Area\AreaController@show']);
     Route::delete('area/{id}/destroy', ['as' => 'area.destroy', 'uses' => 'Area\AreaController@destroy']);
   Route::get('area/search', ['as' => 'area.search', 'uses' => 'Area\AreaController@search']);
  /*autor route*/
    Route::get('autor/new',['as' => 'autor.new','uses'=>'Autor\AutorController@nuevo']);
   Route::post('autor/create', ['as' => 'autor.create', 'uses' => 'Autor\AutorController@create']);
   Route::get('autor/{id}/edit', ['as' => 'autor.edit', 'uses' => 'Autor\AutorController@edit']);
   Route::get('autor/index', ['as' => 'autor.index', 'uses' => 'Autor\AutorController@index']);
   Route::put('autor/{id}', ['as' => 'autor.update', 'uses' => 'Autor\AutorController@update']);
   Route::get('autor/{id}/show', ['as' => 'autor.show', 'uses' => 'Autor\AutorController@show']);
   Route::delete('autor/{id}/destroy', ['as' => 'autor.destroy', 'uses' => 'Autor\AutorController@destroy']);
   Route::get('autor/search', ['as' => 'autor.search', 'uses' => 'Autor\AutorController@search']);
/*investigaci�n route*/
    Route::get('investigacion/new',['as' => 'libroinv.new','uses'=>'LibroInvestigacion\LibroInvestigacionController@nuevo']);
   Route::post('investigacion/create', ['as' => 'libroinv.create', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@create']);
   Route::get('investigacion/{id}/edit', ['as' => 'libroinv.edit', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@edit']);
   Route::get('investigacion/index', ['as' => 'libroinv.index', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@index']);
   Route::put('investigacion/{id}', ['as' => 'libroinv.update', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@update']);
   Route::get('investigacion/{id}/show', ['as' => 'libroinv.show', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@show']);
   Route::delete('investigacion/{id}/destroy', ['as' => 'libroinv.destroy', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@destroy']);
   Route::get('investigacion/search', ['as' => 'libroinv.search', 'uses' => 'LibroInvestigacion\LibroInvestigacionController@search']);
   Route::get('autor/search', ['as' => 'autor.search', 'uses' => 'Autor\AutorController@search']);
   /*ajustes route*/
    Route::get('ajustes', ['as' => 'ajustes.ajustes', 'uses' =>'Ajustes\AjustesController@ajustes']);
    Route::put('ajustes/{id}', ['as' => 'ajustes.update', 'uses' => 'Ajustes\AjustesController@update']);
   /* carrera route */
   Route::get('carrera/search', ['as' => 'carrera.search', 'uses' => 'Carrera\CarreraController@search']);
   /*indice route*/
    
    Route::post('indice/saveOrUpdate', ['as' => 'indice.saveOrUpdate', 'uses' => 'Indice\IndiceController@saveOrUpdate']);
    Route::get('indice/{id}/edit', ['as' => 'indice.edit', 'uses' => 'Indice\IndiceController@edit']);
    Route::get('indice/{libro_inv_id}/lists', ['as' => 'indice.lists', 'uses' => 'Indice\IndiceController@lists']);
    Route::delete('indice/{id}/destroy', ['as' => 'indice.destroy', 'uses' => 'Indice\IndiceController@destroy']);
    /*cita route*/
    
    Route::post('cita/saveOrUpdate', ['as' => 'cita.saveOrUpdate', 'uses' => 'Cita\CitaController@saveOrUpdate']);
    Route::get('cita/{id}/edit', ['as' => 'cita.edit', 'uses' => 'Cita\CitaController@edit']);
    Route::get('cita/{libro_inv_id}/lists', ['as' => 'cita.lists', 'uses' => 'Cita\CitaController@lists']);
    Route::delete('cita/{id}/destroy', ['as' => 'cita.destroy', 'uses' => 'Cita\CitaController@destroy']);
   /*route role*/
    Route::get('role/new',['as' => 'role.new','uses'=>'Role\RoleController@nuevo']);
     Route::post('role/create', ['as' => 'role.create', 'uses' => 'Role\RoleController@create']);
     Route::get('role/{id}/edit', ['as' => 'role.edit', 'uses' => 'Role\RoleController@edit']);
     Route::get('role/index', ['as' => 'role.index', 'uses' => 'Role\RoleController@index']);
     Route::put('role/{id}', ['as' => 'role.update', 'uses' => 'Role\RoleController@update']);
     Route::get('role/{id}/show', ['as' => 'role.show', 'uses' => 'Role\RoleController@show']);
     Route::delete('role/{id}/destroy', ['as' => 'role.destroy', 'uses' => 'Role\RoleController@destroy']);
     Route::get('role/search', ['as' => 'role.search', 'uses' => 'Role\RoleController@search']);
     Route::post('role/unique','Role\RoleController@unique');
	 
	 /*permission route*/
	 Route::get('permission/manager', ['as' => 'permission.manager', 'uses' => 'PermissionRole\PermissionRoleController@permissionManager']);
     Route::post('permission/manager', ['as' => 'permission.update', 'uses' => 'PermissionRole\PermissionRoleController@saveOrDelete']);
     /* log de auditoria*/
     Route::get('logs_audits', ['as' => 'logs.audits', 'uses' => 'LogAudit\LogAuditController@view']);
	 Route::get('logs_audits/search', ['as' => 'logs_audits.search', 'uses' => 'LogAudit\LogAuditController@search']);
	 Route::delete('logs_audits/destroyAll', ['as' => 'logs_audits.destroyAll', 'uses' => 'LogAudit\LogAuditController@destroyAll']);
   /*programa route*/
   Route::get('programa/new',['as' => 'programa.new','uses'=>'Programa\ProgramaController@nuevo']);
   Route::post('programa/create', ['as' => 'programa.create', 'uses' => 'Programa\ProgramaController@create']);
   Route::get('programa/{id}/edit', ['as' => 'programa.edit', 'uses' => 'Programa\ProgramaController@edit']);
   Route::get('programa/index', ['as' => 'programa.index', 'uses' => 'Programa\ProgramaController@index']);
   Route::put('programa/{id}', ['as' => 'programa.update', 'uses' => 'Programa\ProgramaController@update']);
   Route::get('programa/{id}/show', ['as' => 'programa.show', 'uses' => 'Programa\ProgramaController@show']);
   Route::delete('programa/{id}/destroy', ['as' => 'programa.destroy', 'uses' => 'Programa\ProgramaController@destroy']);
   Route::get('programa/search', ['as' => 'programa.search', 'uses' => 'Programa\ProgramaController@search']);
  });
   Route::get('/',['as' => 'sites','uses'=>'Sites\SitesController@sites']);
   Route::get('sites',['as' => 'sites','uses'=>'Sites\SitesController@sites']);
   Route::post('sites/login', ['as' => 'sites.login', 'uses' => 'Sites\Login\LoginController@postLogin']);
   Route::get('sites/logout', ['as' => 'sites.logout', 'uses' => 'Sites\Login\LoginController@getLogout']);
   Route::get('sites/about-Us',['as' => 'sites.aboutUs','uses'=>'Sites\SitesController@aboutUs']);
   Route::get('sites/investigacion/advanced-search',['as'=>'libroinv.advanced-search','uses'=>'Sites\LibroInvestigacion\LibroInvestigacionController@advancedSearch']);
   Route::get('sites/investigacion/{id}/view',['as'=>'libroinv.view','uses'=>'Sites\LibroInvestigacion\LibroInvestigacionController@show']);
   Route::get('sites/investigacion/año/{year}/',['as'=>'libroinv.lists-by-year','uses'=>'Sites\SitesController@findByYearsLists']);
   Route::get('sites/{id}/area',['as'=>'sites.area','uses'=>'Sites\Area\AreaController@areaPage']);
   Route::get('sites/contacto',['as' => 'sites.contacto','uses'=>'Sites\SitesController@contactPage']);
   Route::post('contact/send', ['as' => 'contactForm.send', 'uses' => 'Sites\SitesController@sendContactForm']);
   Route::get('sites/registration/new',['as' => 'registration.new','uses'=>'Sites\Registration\RegistrationController@nuevo']);
   Route::post('registration/send',['as' => 'registration.send','uses'=>'Sites\Registration\RegistrationController@sendRegistrationForm']);
   Route::group(['middleware' => ['web']], function() {
     Route::get('sites/user/edit', ['as' => 'webSiteUser.edit', 'uses' => 'Sites\User\UserController@edit']);
     Route::put('sites/user/update', ['as' => 'webSiteUser.update', 'uses' => 'Sites\User\UserController@update']);
     Route::get('sites/document/{id}/view', ['as' => 'sites.doc_view', 'uses' => 'Sites\LibroInvestigacion\LibroInvestigacionController@document_view']);
  });
