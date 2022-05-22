<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertArray = [
            [
                'guard_name' => 'web',
                'name'       => 'Notice management'
            ],
            [
                'guard_name' => 'web',
                'name'       => 'User management'
            ],
        ];

        Permission::insert($insertArray);
    }
}
