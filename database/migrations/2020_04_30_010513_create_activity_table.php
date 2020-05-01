<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('activity', function (Blueprint $table) {
            // bigIncrements 相當於 AUTO_INCREMENT & primary key
            $table->bigIncrements('idActivity');
            $table->string('activityName', 15)->comment('活動名稱');
            $table->dateTime('startDate')->comment('開始時間');
            $table->dateTime('endDate')->comment('結束時間');
            $table->integer('needSignup')->comment('需報名');
            $table->integer('voteQry')->comment('投票數 0無 1每人一票 2二票');
            $table->integer('rule')->comment('評分方式0管理者指定名次1投票決定2評分決定');
            $table->string('organizer', 15)->comment('主辦單位');
            $table->string('manager', 10)->comment('活動管理者');
            $table->string('activityDescription', 50)->comment('活動說明');
            $table->integer('isVisible')->comment('是否公布資訊');
            $table->dateTime('startAnnounce', 50)->comment('開始公告');
            $table->string('attachmentFile', 50)->comment('選舉說明附檔');
            // 加入軟刪除
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
        Schema::dropIfExists('activity');
    }
}
