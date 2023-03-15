<?php

namespace App\Database\Seeds;

use App\Models\RolesModel;
use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $model = new RolesModel();
        
        $model->save([
            'name' => 'admin',
            'permissions' => 777
        ]);

        $model->save([
            'name' => 'manager',
            'permissions' => 555
        ]);

        $model->save([
            'name' => 'user',
            'permissions' => 333
        ]);

        $model->save([
            'name' => 'guest',
            'permissions' => 111
        ]);
    }
}
