<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Zone;
use App\Models\Member;
use App\Models\Country;
use App\Models\TaxRate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Organisation;
use Illuminate\Database\Seeder;
use App\Models\OrganisationConfig;
use Illuminate\Support\Facades\DB;
use App\Models\OrganisationConfigMember;
use App\Models\OrganisationConfiguration;
use App\Models\OrganisationConfigFinancial;
use App\Models\OrganisationConfigSubscription;

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
        // Zones
        Zone::factory(10)->create();

        // Tax Rates
        TaxRate::factory(10)->create();


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
            'is_admin' => true,
            'is_active' => true,
        ]);
        User::factory()->create($userData);

        $org = Organisation::factory()->create();
        $org2 = Organisation::factory()->create();
        OrganisationConfig::factory()->create();
        OrganisationConfigFinancial::create([
            'organisation_id' => $org->id,
            'currency' => 'GBP',
            'vat_status' => true,
            'vat_number' => '123456789',
            'financial_year_end' => '2021-12-31',
        ]);
        OrganisationConfigMember::create([
            'organisation_id' => $org->id,
            'should_authorize_members' => true,
            'require_2fa' => false,
            'max_days_between_2fa' => 0,
            'require_physical_address' => false,
            'require_physical_address_for_groups' => false,
            'has_junior_members' => true,
            'junior_member_max_age' => 18,
            'junior_member_auto_renew_to_adult' => true,
            'has_group_members' => true,
            'does_each_group_member_have_membership_number' => true,
            'has_membership_numbers' => true,
            'does_membership_numbers_auto_increment' => true,
            'can_member_sign_declaration_for_other_adult_members' => true,
            'prompt_admin_to_remove_inactive_members' => true,
            'max_days_inactive' => 365,
        ]);

        OrganisationConfigSubscription::create([
            'organisation_id' => $org->id,
            'can_member_have_more_than_one_subscription' => true,
            'can_have_subscription_without_membership' => false,
            'recently_expired_annual_subscription_months' => 1,
            'recently_expired_monthly_subscription_days' => 1,
            'recently_expired_other_period_days' => 1,
            'renew_annual_subscription_months' => 12,
            'renew_monthly_subscription_days' => 1,
            'renew_other_subscription_days' => 1,
            'forced_joining_fee' => false,
            'subscription_joining_id' => 1,
            'auto_renewal_order_days' => 1,
        ]);


        $member = Member::factory()->create(array_merge($data, ['user_id' => 1, 'organisation_id' => $org->id, 'role_id' => 1]));
        $member2 = Member::factory()->create(array_merge($data, ['user_id' => 1, 'organisation_id' => $org2->id, 'role_id' => 1]));

        //$user->organisations()->attach(1, ['is_owner' => true]);

        $this->call([
            LookupSeeder::class,
        ]);
    }
}
