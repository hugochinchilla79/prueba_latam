<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('id_country')->unsigned();
            $table->foreign('id_country', 'fk_user_country')->references('id_country')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('fk_user_country');
            $table->dropColumn('id_country');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
};
