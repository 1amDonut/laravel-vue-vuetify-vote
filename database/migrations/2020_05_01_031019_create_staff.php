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
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('staffSN')->comment('序號');
            $table->integer('group')->comment('群組');
            $table->string('division', 50)->comment('單位');
            $table->string('name', 11)->comment('姓名');
            $table->string('sex', 2)->comment('性別');
            $table->integer('Scount')->comment('得票數');
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
