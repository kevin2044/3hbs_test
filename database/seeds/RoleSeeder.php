<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin'],);
        $roletwo = Role::create(['name' => 'operations']);

        Permission::create(['name' => 'view airline']);
        Permission::create(['name' => 'create airline']);
        Permission::create(['name' => 'update airline']);
        Permission::create(['name' => 'delete airline']);

        Permission::create(['name' => 'view airport']);
        Permission::create(['name' => 'create airport']);
        Permission::create(['name' => 'update airport']);
        Permission::create(['name' => 'delete airport']);

        Permission::create(['name' => 'view flight'])->syncRoles([$role]);
        Permission::create(['name' => 'create flight'])->syncRoles([$role]);
        Permission::create(['name' => 'update flight'])->syncRoles([$role]);
        Permission::create(['name' => 'delete flight'])->syncRoles([$role]);
    }
}
