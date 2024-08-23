<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Country;
use App\Models\Permission;
use App\Models\Organisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // General
        // Get all tables
        $tables = DB::select("SELECT n.nspname AS schema,
                   t.relname AS table_name,
                   t.relkind AS type,
                   t.relowner::regrole AS owner
            FROM pg_class AS t
              JOIN pg_namespace AS n ON t.relnamespace = n.oid
            /* only tables and partitioned tables */
            WHERE t.relkind IN ('r', 'p')
              /* exclude system schemas */
              AND n.nspname !~~ ALL ('{pg_catalog,pg_toast,information_schema,pg_temp%}');");
        $arr = ['access', 'create', 'delete', 'update', 'read'];
        $roles = ['super-admin', 'admin', 'member', 'guest'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        foreach ($tables as $table) {

            $table_name = $table->table_name;
            foreach ($arr as $perm) {
                $perm = Permission::create(['name' => strtoupper(str_replace("_", " ", $table_name)), 'access' =>  $table_name . '-' . $perm, 'group_id' => 1]);
                //$perm->assignRole('super-admin');
            }
        }
        // Countries
        $countries = fopen(base_path('database/data/countries.csv'), 'r');

        while (($country = fgetcsv($countries, 555, ";")) !== false) {

            //fwrite(STDOUT, print_r($country, true));
            $data = [
                'name' => $country[0],
                'iso_code_2' => $country[1],
                'iso_code_3' => $country[2],
                'currency_code' => $country[3],
                'currency_symbol' => $country[4],
                'symbol_left' => $country[5],
                'decimal_place' => $country[6],
                'decimal_point' => $country[7],
                'thousands_point' => $country[8],
            ];
            Country::create($data);
        }
        fclose($countries);
        // User::factory(10)->create();
        $data = [
            'email' => 'a@a.com',
            'title' => 'Mr',
            'first_name' => 'Stuart',
            'last_name' => 'Harrison',
            'mobile_phone' => '1234567890',
            'date_of_birth' => '1970-06-15',
            'gender' => 'other',

        ];

        $userData = array_merge($data, [
            'is_membi_admin' => true,
        ]);
        User::factory()->create($userData);

        $org = Organisation::factory()->create();
        $org2 = Organisation::factory()->create();
    }
}
