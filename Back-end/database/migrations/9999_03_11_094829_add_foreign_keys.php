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
        Schema::table('restaurants', function (Blueprint $table) {
            $table -> foreignId('user_id') -> constrained();
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained();
        });

        Schema::table('restaurant_typology', function (Blueprint $table) {
            $table -> foreignId('restaurant_id') -> constrained();
            $table -> foreignId('typology_id') -> constrained();
        });

        Schema::table('dish_order', function (Blueprint $table) {
            $table -> foreignId('dish_id') -> constrained();
            $table -> foreignId('order_id') -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table -> dropForeign(['user_id']);
            
            $table -> dropColumn('user_id'); 
        }); 

        Schema::table('dishes', function (Blueprint $table) {
            $table -> dropForeign(['restaurant_id']);
            
            $table -> dropColumn('restaurant_id'); 
        }); 
        
        Schema::table('restaurant_typology', function (Blueprint $table) {
            $table -> dropForeign(['restaurant_id']);
            $table -> dropForeign(['typology_id']);
            
            $table -> dropColumn('restaurant_id'); 
            $table -> dropColumn('typology_id'); 
        }); 

        Schema::table('dish_order', function (Blueprint $table) {
            $table -> dropForeign(['dish_id']);
            $table -> dropForeign(['order_id']);
            
            $table -> dropColumn('dish_id'); 
            $table -> dropColumn('order_id'); 
        }); 
    }
};
