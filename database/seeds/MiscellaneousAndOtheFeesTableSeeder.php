<?php

use Illuminate\Database\Seeder;

class MiscellaneousAndOtherFeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            DB::table('miscellaneous_and_other_fees')->insert([ 
                ['class_id' => $i, 'item_code' => 'MTF 28909-10', 'item_description' => 'Monthly Tuition', 'item_price' => 1000, 'item_image' => 'default.png'],
                ['class_id' => $i, 'item_code' => 'BK-2007-01', 'item_description' => 'Books', 'item_price' => 2500, 'item_image' => 'default.png'],
                ['class_id' => $i, 'item_code' => 'ID348790-20', 'item_description' => 'ID', 'item_price' => 300, 'item_image' => 'default.png'],
                ['class_id' => $i, 'item_code' => 'UNF -10029-19', 'item_description' => 'Uniform', 'item_price' => 800, 'item_image' => 'default.png'],
                ['class_id' => $i, 'item_code' => 'ENRL -68009-02', 'item_description' => 'Enrollment', 'item_price' => 200, 'item_image' => 'default.png'],
                ['class_id' => $i, 'item_code' => 'PEUN -89007-11', 'item_description' => 'PE Uniform', 'item_price' => 600, 'item_image' => 'default.png'],
            ]);
        }
    }
}
