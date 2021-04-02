<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 10000005; $i < 10000105; $i++) 
        {
            DB::table('payments')->insert([ 
                'student_id' => $i, 
                'amount_payable' => '0',
                'amount_paid' => '0',
                'amount_due' => '0',
            ]);
        }
    }
}
