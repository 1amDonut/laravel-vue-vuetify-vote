<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->bigIncrements('idApplied');
            $table->integer('idSignUp')->comment('報名者ID');
            $table->string('name', 11)->comment('姓名');
            $table->string('deparment', 50)->comment('單位');
            $table->integer('votingQty')->comment('累計得票數')->nullable();
            $table->dateTime('signupTime')->comment('報名時間');
            $table->string('docFile', 150)->comment('送件附檔')->nullable();
            $table->integer('idActivity')->comment('活動編號');
            $table->timestamps();
            // 軟刪除
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applied');
    }
}
