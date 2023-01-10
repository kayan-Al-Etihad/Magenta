<?php

use App\ProductRanking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productRankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ProductRanking::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            DB::table('product_rankings')->insert([
            ['product_ranking' => 'New_Arrivals'],
            ['product_ranking' => 'Best_Seller'],
            ['product_ranking' => 'Most_View'],
            ['product_ranking' => 'Discounts'],

        ]);
 
    }
}
