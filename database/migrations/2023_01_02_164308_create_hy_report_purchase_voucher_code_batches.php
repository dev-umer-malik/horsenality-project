<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHyReportPurchaseVoucherCodeBatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hy_report_purchase_voucher_code_batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_name');
            $table->string('batch_description');
            $table->string('product_sku');
            $table->timestamp('batch_expires')->nullable();
            $table->boolean('expired')->default(0);
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
        Schema::dropIfExists('hy_report_purchase_voucher_code_batches');
    }
}
