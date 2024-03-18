<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //operaciones sobre la tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //operaciones sobre la tabla estados de obras
            'ver-estado',
            'crear-estado',
            'editar-estado',
            'borrar-estado',
            //operaciones sobre la tabla de obras
            'ver-obra',
            'crear-obra',
            'editar-obra',
            'borrar-obra',
            //operaciones sobre la tabla categorias
            'ver-categoria',
            'crear-categoria',
            'editar-categoria',
            'borrar-categoria',
            //operaciones sobre la tabla tipos
            'ver-tipo',
            'crear-tipo',
            'editar-tipo',
            'borrar-tipo',
            //operaciones sobre la tabla marcas
            'ver-marca',
            'crear-marca',
            'editar-marca',
            'borrar-marca',
            //operaciones sobre la tabla catalogos
            'ver-catalogo',
            'crear-catalogo',
            'editar-catalogo',
            'borrar-catalogo',
            //operaciones sobre la tabla categoria trabajador
            'ver-trabajadorcategoria',
            'crear-trabajadorcategoria',
            'editar-trabajadorcategoria',
            'borrar-trabajadorcategoria',
            //operaciones sobre la tabla trabajadores
            'ver-trabajador',
            'crear-trabajador',
            'editar-trabajador',
            'borrar-trabajador',
            //operaciones sobre la tabla libreta
            'ver-libreta',
            'crear-libreta',
            'editar-libreta',
            'borrar-libreta',
            //operaciones sobre la tabla de almacen
            'ver-almacen',
            'crear-almacen',
            'editar-almacen',
            'borrar-almacen',
            //operaciones sobre la tabla entrega de productos
            'ver-entrega',
            'crear-entrega',
            'editar-entrega',
            'borrar-entrega',
            //operaciones sobre la tabla obra_trabajador
            'ver-asignacion_obra',
            'crear-asignacion_obra',
            'borrar-asignacion_obra',

        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
