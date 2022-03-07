<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = array(
           /* array(
                'name'  => "Nuevo Usuario", 
                'slug'=>"usuario.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array(
                'name'  => "Actualizar Usuario", 
                'slug'=>"usuario.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Usuarios", 
                'slug'=>"usuario.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "eliminar Usuario", 
                'slug'=>"usuario.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Nueva Area", 
                'slug'=>"area.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Area", 
                'slug'=>"area.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Area", 
                'slug'=>"area.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Areas", 
                'slug'=>"area.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Nuevo Autor", 
                'slug'=>"autor.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Autor", 
                'slug'=>"autor.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Autor", 
                'slug'=>"autor.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Autores", 
                'slug'=>"autor.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Nueva Investigación", 
                'slug'=>"libroinv.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Investigación", 
                'slug'=>"libroinv.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Investigación", 
                'slug'=>"libroinv.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Investigaciones", 
                'slug'=>"libroinv.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Ajustes", 
                'slug'=>"ajustes.update",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Crear Indices", 
                'slug'=>"indice.saveOrUpdate",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Indice", 
                'slug'=>"indice.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Indices", 
                'slug'=>"indice.lists",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Indice", 
                'slug'=>"indice.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Crear Cita", 
                'slug'=>"cita.saveOrUpdate",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Cita", 
                'slug'=>"cita.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Citas", 
                'slug'=>"cita.lists",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Citas", 
                'slug'=>"cita.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Crear Rol de Usuario", 
                'slug'=>"role.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
               array( 
                'name'  => "Actualizar Rol de Usuario", 
                'slug'=>"role.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Rol de Usuario", 
                'slug'=>"role.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista Roles de Usuarios", 
                'slug'=>"role.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Administración de Permisos", 
                'slug'=>"permission.manager",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
               array( 
                'name'  => "Log de Auditoria", 
                'slug'=>"logs.audits",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Nuevo Programa", 
                'slug'=>"programa.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Programa", 
                'slug'=>"programa.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Programa", 
                'slug'=>"programa.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Programas", 
                'slug'=>"programa.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),*/
              array( 
                'name'  => "Nueva Investigación", 
                'slug'=>"datos-abiertos.new",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Actualizar Investigación", 
                'slug'=>"datos-abiertos.edit",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Eliminar Investigación", 
                'slug'=>"datos-abiertos.destroy",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
              array( 
                'name'  => "Lista de Investigación", 
                'slug'=>"datos-abiertos.index",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
              ),
           );
           DB::table('permissions')->insert($items);
    }
}
