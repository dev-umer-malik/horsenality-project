<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HyReportPurchasesAddProductField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hy_report_purchases', function (Blueprint $table) {
            $table->integer('product_id')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hy_report_purchases', function (Blueprint $table) {
            $table->dropColumn('product_id');
        });
    }
}
