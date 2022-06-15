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
        Schema::table('users', function (Blueprint $table) {
            // $table->unsignedBigInteger('nonghyup_id');
            // $table->foreingn('nonghyup_id')->references('id')->on('nonghyups');

            $table->foreignId('nonghyup_id')
                    ->after('region')
                    ->nullable()
                    ->constrained('nonghyups')
                    ->casecadeOnUpdate()
                    ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nonghyup_id');
        });
    }
};
