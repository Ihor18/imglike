<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('origin')->nullable();
            $table->text('en')->nullable();
            $table->text('ru')->nullable();
            $table->text('ua')->nullable();
            $table->text('de')->nullable();
            $table->text('fr')->nullable();
            $table->text('it')->nullable();
            $table->text('es')->nullable();
            $table->text('pt')->nullable();
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
        Schema::dropIfExists('localization');
    }
}
