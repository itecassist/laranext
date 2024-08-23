<?php

namespace Database\Seeders;

use App\Models\Lookup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lookups = [
            [
                'organisation_id' => 0,
                'name' => 'gender',
                'description' => 'Gender',
                'value' => 'male',
            ],
            [
                'organisation_id' => 0,
                'name' => 'gender',
                'description' => 'Gender',
                'value' => 'female'
            ] .
                [
                    'organisation_id' => 0,
                    'name' => 'gender',
                    'description' => 'Gender',
                    'value' => 'other'
                ] .
                [
                    'organisation_id' => 0,
                    'name' => "membership",
                    'description' => 'Subscription',
                    'value' => 'free',
                ],
            [
                'organisation_id' => 0,
                'name' => "membership",
                'description' => 'Subscription',
                'value' => 'basic',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Type',
                'value' => 'individual',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Type',
                'value' => 'group',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Type',
                'value' => 'corporate',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Type',
                'value' => 'student',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Type',
                'value' => 'family',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'senior',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'life',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'honorary',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'associate',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'affiliate',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'complimentary',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'trial',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'provisional',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'pending',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'suspended',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'resigned',
            ],
            [
                'organisation_id' => 0,
                'name' => "membership_type",
                'description' => 'Subscription Membership Type',
                'value' => 'deceased',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'daily',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'weekly',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'monthly',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'yearly',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'lifetime',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'no_period',
            ],
            [
                'organisation_id' => 0,
                'name' => "period",
                'description' => 'Subscription Membership Period',
                'value' => 'installments',
            ],
            [
                'organisation_id' => 0,
                'name' => "renewals",
                'description' => 'Subscription Membership Renewals',
                'value' => 'fixed_end_data',
            ],
            [
                'organisation_id' => 0,
                'name' => "renewals",
                'description' => 'Subscription Membership Renewals',
                'value' => 'individual_anniversary',
            ],
            [
                'organisation_id' => 0,
                'name' => "renewals",
                'description' => 'Subscription Membership Renewals',
                'value' => 'not_renewable',
            ],
            [
                'organisation_id' => 0,
                'name' => "published",
                'description' => 'Published',
                'value' => 'published',
            ],
            [
                'organisation_id' => 0,
                'name' => "published",
                'description' => 'Published',
                'value' => 'renewal_only',
            ],
            [
                'organisation_id' => 0,
                'name' => "published",
                'description' => 'Published',
                'value' => 'un_published',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option',
                'value' => 'individual',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option',
                'value' => 'adult',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option',
                'value' => 'junior',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option',
                'value' => 'family_individual_in_a_family',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option',
                'value' => 'corporate_non_family',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option Rate',
                'value' => 'flat_price',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option Rate',
                'value' => 'number_of_subscriptions',
            ],
            [
                'organisation_id' => 0,
                'name' => "eligibility",
                'description' => 'Subscription Price Option Rate',
                'value' => 'custom_value',
            ],
            [
                'organisation_id' => 0,
                'name' => "late_fee_option",
                'description' => 'Subscription Price Renewals',
                'value' => 'percentage',
            ],
            [
                'organisation_id' => 0,
                'name' => "late_fee_option",
                'description' => 'Subscription Price Renewals',
                'value' => 'individual',
            ],
            [
                'organisation_id' => 0,
                'name' => "form",
                'description' => 'Subscription Forms',
                'value' => 'not_applicable',
            ],
            [
                'organisation_id' => 0,
                'name' => "form",
                'description' => 'Subscription Forms',
                'value' => 'select_existing',
            ],
            [
                'organisation_id' => 0,
                'name' => "form",
                'description' => 'Subscription Forms',
                'value' => 'create_new',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'order_placed',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'payment_received',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'payment_problem',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled_before_payment',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled_pending_payment',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled_refund_scheduled',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled_refund_due',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled_not_refunded',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'cancelled_refunded',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'partially_cancelled',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'no_payment_required',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'completed',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'partial_payment',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'refunded',
            ],
            [
                'organisation_id' => 0,
                'name' => "order_status",
                'description' => 'Orders',
                'value' => 'payment_transfer',
            ],
        ];

        Lookup::insert($lookups);
    }
}
