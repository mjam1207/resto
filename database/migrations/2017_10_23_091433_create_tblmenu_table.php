<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmenu', function (Blueprint $table) {
            $table->increments('menuId')->unsigned();
            $table->integer('categoryId');
            $table->string('menuName');
            $table->double('menuPrice');
            $table->text('menuDesc');
            $table->string('menuStatus');
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
        Schema::dropIfExists('tblmenu');
    }
}
