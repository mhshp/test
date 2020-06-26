<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GohnakhorideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gohnakhoride', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('goh');
            $table->string('name', 100);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gohnakhoride');
    }
}
