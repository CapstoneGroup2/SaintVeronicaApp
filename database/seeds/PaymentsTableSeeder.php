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
        DB::table('payments')->insert([ 
            'student_id' => 10000000, 
            'amount_payable' => '5400',
            'amount_paid' => '0',
            'amount_due' => '5400',
        ]);
    }
}
