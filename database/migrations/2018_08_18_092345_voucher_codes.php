<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoucherCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->unsignedInteger('recipient_id');
            $table->unsignedInteger('special_id');
            $table->dateTime('expiry_date');
            $table->boolean('used');
            $table->dateTime('used_at');
            $table->timestamps();
            $table->foreign('recipient_id')->references('id')->on('recipients');
            $table->foreign('special_id')->references('id')->on('special_offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('voucher_codes');
    }
}
