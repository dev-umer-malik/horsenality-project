<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HyReportPurchaseDelivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hy_report_purchase_delivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('purchase_id');
            $table->boolean('mail_sent');
            $table->dateTime('requested_at')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('delivered_at')->nullable(true);
            $table->boolean('error_status')->nullable(false)->default(false);
            $table->string('error_message')->nullable(true);
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
