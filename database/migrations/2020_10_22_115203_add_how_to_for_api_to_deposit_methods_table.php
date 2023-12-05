<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHowToForApiToDepositMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deposit_methods', function (Blueprint $table) {
            $table->longText('how_to_api')->nullable()->defaul(NULL);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposit_methods', function (Blueprint $table) {
            $table->longText('how_to_api');
        });
    }
}
