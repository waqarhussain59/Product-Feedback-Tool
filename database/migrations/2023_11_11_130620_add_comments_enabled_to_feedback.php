<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsEnabledToFeedback extends Migration
{
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->boolean('comments_enabled')->default(true);
        });
    }

    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropColumn('comments_enabled');
        });
    }
}
