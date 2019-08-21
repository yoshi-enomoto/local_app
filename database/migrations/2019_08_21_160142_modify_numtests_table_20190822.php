<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyNumtestsTable20190822 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('numtests', function (Blueprint $table) {
            // ZEROFILLはLaravelのmigrationはZEROFILL対応していない為、直でSQLを書いて実行するしかない。
            // $sql = 'ALTER TABLE table_name ADD column_name INT ZEROFILL';
            $sql = 'ALTER TABLE numtests ADD int_zerofill INT ZEROFILL';
            DB::statement($sql);
            $sql = 'ALTER TABLE numtests ADD double_zerofill DOUBLE ZEROFILL';
            DB::statement($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('numtests', function (Blueprint $table) {
            // $table->dropColumn('int_zerofill');
            // $table->dropColumn('double_zerofill');
            $table->dropColumn(['int_zerofill', 'double_zerofill']);
        });
    }
}
