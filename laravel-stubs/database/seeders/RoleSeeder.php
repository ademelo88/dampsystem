<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach(['Admin','Estimator','Scheduler','Technician','Accounts','CSR'] as $r){
            Role::firstOrCreate(['name'=>$r]);
        }
    }
}
