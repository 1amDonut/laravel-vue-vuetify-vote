<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ->nullable 允許空值（NULL）
        Schema::create('participate', function (Blueprint $table) {
            $table->bigIncrements('participateSN')->comment('序號');
            // group為mysql保留字元 故以底線加入字元前面
            $table->integer('_group')->comment('群組')->nullable();
            $table->string('department', 50)->comment('單位')->nullable();
            $table->string('name', 11)->comment('姓名');
            $table->string('sex', 2)->comment('性別');
            $table->integer('Scount')->comment('得票數')->nullable();
            $table->integer('idActivity')->comment('外來鍵');
            $table->integer('byVoter')->comment('是否被選舉人');
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
        Schema::dropIfExists('staff');
    }
}
