<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDeletedFromTopicSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_speaker', function (Blueprint $table) {
            if (Schema::hasColumn('topic_speaker', 'deleted')) {
                $table->dropColumn('deleted');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_speaker', function (Blueprint $table) {
            //
        });
    }
}
