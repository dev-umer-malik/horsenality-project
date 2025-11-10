<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHyReportPurchaseVoucherCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hy_report_purchase_voucher_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('batch_id');
            $table->bigInteger('voucher_code');
            $table->boolean('redeemed')->default(0);
            $table->integer('redeem_purchase_id')->nullable();
            $table->timestamp('redeemed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hy_report_purchase_voucher_codes');
    }
}
