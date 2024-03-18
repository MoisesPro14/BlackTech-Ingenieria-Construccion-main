<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Spatie\Permission\Models\Permission;

class SeederTablaPermisosDb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //operaciones sobre la tabla stocks , para crear el stock almacen
            'crear-stockalmacen',
            //operaciones sobre la tabla stocks
            'ver-stock',
            'crear-stock',
            'editar-stock',
            'borrar-stock',
            //operaciones sobre la tabla stocks , para crear el stock en Entrega
            'crear-stockentrega'
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
