<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHyReportPurchasePromoScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hy_report_purchase_promo_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('sku');
            $table->string('promo_type');
            $table->string('email_template');
            $table->timestamp('deliver_on');
            $table->boolean('delivered')->default(0);
            $table->integer('delivered_purchase_id')->nullable();
            $table->boolean('revoked')->default(0);
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('hy_report_purchase_promo_schedule');
    }
}
