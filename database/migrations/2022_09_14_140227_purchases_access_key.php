<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchasesAccessKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hy_report_purchases', function (Blueprint $table) {
            $table->string('purchase_email', 255)->nullable(false)->default('tim@tcwdigital.com');
            $table->bigInteger('purchase_code')->nullable(true);
            $table->boolean('claimed')->nullable(false)->default(1);
            $table->dateTime('claimed_on')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
