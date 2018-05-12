<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblmenucategoryIdToTblmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblmenucategory', function (Blueprint $table) {
            $table->integer('categoryId')->nullable()->after('menuId')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('tblmenucategory', function (Blueprint $table) {
            $table->dropColumn('categoryId');
        });
    }
}
