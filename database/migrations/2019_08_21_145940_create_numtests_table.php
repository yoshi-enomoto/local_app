<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numtests', function (Blueprint $table) {
            $table->increments('id');
            $table
                ->decimal('decimal')
                ->comment('固定小数点（桁縛りなしでも「, 8, 2」が引数に渡される。「,20 ,20」までは確認済み）')->nullable();
            $table
                ->unsignedDecimal('unsigned_decimal')
                ->comment('固定小数点（指定の符号なし：桁縛りなしでも「, 8, 2」が引数に渡される。「,20 ,20」までは確認済み））')->nullable();
            $table
                ->float('float')
                ->comment('浮動小数点数（単精度：桁縛りなしでも「, 8, 2」が引数に渡される。「,20 ,20」までは確認済み））')->nullable();
            $table
                ->double('double')
                ->comment('浮動小数点数（倍精度：桁縛りなしでも引数は渡されない。「,20 ,20」までは確認済み））')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('numtests');
    }
}
