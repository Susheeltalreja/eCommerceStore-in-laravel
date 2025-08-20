<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hastable('register')){
            Schema::create('register', function(Blueprint $table){
                $table->id('user_id');
                $table->string('name')->NOTNULL();
                $table->string('email')->UNIQUE();
                $table->string('password')->notnull();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
