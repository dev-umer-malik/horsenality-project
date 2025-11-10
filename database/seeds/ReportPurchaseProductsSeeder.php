<?php

use Illuminate\Database\Seeder;

class ReportPurchaseProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hy_report_purchase_products')->insert([
            ['report_type_id' => 200, 'sku' => 'HOHUMONLY', 'product_title' => 'Humanality Report (Digital)', 'active' => true],
            ['report_type_id' => 201, 'sku' => 'HOHOR2009', 'product_title' => 'Horsenality Report (Digital)', 'active' => true]
        ]);
    }
}
