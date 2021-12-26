<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('chapter', 100)->nullable();
            $table->string('manufacturer', 100)->nullable();
            $table->string('product', 100)->nullable();
            $table->string('article', 50)->nullable();
            $table->integer('number_offers')->nullable(false);//
            $table->longText('price')->nullable(false);//
            $table->string('currency', 10)->nullable();
            $table->string('description',255)->nullable();
            $table->string('maker',255)->nullable();
            $table->string('importer',255)->nullable();
            $table->string('service_center',255)->nullable();
            $table->longText('guarantee')->nullable();
            $table->longText('delivery_Minsk')->nullable();
            $table->longText('delivery_RB')->nullable();
            $table->string('stock',20)->nullable();
            $table->string('service_life',10)->nullable();
            $table->string('for_business', 10)->default('нет')->nullable();
            $table->string('credit',20)->default('нет')->nullable();
            $table->string('installment_payment',10)->nullable();;
            $table->string('price_halva',10)->default(0)->nullable();
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
