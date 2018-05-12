<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageColToTblmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblmenu', function (Blueprint $table) {
            $table->string('image')->nullable()->after('menuPrice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        SSchema::table('tblmenu', function($table) {
            $table->dropColumn('menuImg');
        });
    }
}
