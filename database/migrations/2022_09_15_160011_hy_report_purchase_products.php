<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HyReportPurchaseProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hy_report_purchase_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('report_type_id');
            $table->string('sku');
            $table->string('product_title');
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hy_report_purchase_products');
    }
}
