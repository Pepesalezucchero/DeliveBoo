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
        Schema::table('dish_restaurant', function (Blueprint $table) {
            $table -> foreignId('dish_id') -> constrained();
            $table -> foreignId('restaurant_id') -> constrained();
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table -> foreignId('user_id') -> constrained();
            $table -> foreignId('typology_id') -> constrained();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_restaurant', function (Blueprint $table) {
            $table -> dropForeign(['dish_id']);
            $table -> dropForeign(['restaurant_id']);
            
            $table -> dropColumn('dish_id');
            $table -> dropColumn('restaurant_id');  
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table -> dropForeign(['user_id']);
            $table -> dropForeign(['typology_id']);
            
            $table -> dropColumn('user_id'); 
            $table -> dropColumn('typology_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table -> dropForeign(['restaurant_id']);
            
            $table -> dropColumn('restaurant_id'); 
        });
        
    }
};
