<?php

namespace App\Database\Seeds;

use App\Models\UsersModel;
use CodeIgniter\Database\Seeder;

class AddDefaultUsers extends Seeder
{
    public function run()
    {
        $model = new UsersModel();

        $model->save([
            'name' => 'admin',
            'email' => 'admin@me.local',
            'role' => 'admin',
            'password' => password_hash('1234', PASSWORD_DEFAULT)
        ]);

        $model->save([
            'name' => 'user',
            'email' => 'user@me.local',
            'role' => 'user',
            'password' => password_hash('1234', PASSWORD_DEFAULT)
        ]);

        $model->save([
            'name' => 'manager',
            'email' => 'manager@me.local',
            'role' => 'manager',
            'password' => password_hash('1234', PASSWORD_DEFAULT)
        ]);

        $model->save([
            'name' => 'guest',
            'email' => 'guest@me.local',
            'role' => 'guest',
            'password' => password_hash('1234', PASSWORD_DEFAULT)
        ]);
    }
}