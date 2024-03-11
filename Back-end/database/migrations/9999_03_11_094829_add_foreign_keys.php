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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_restaurant', function (Blueprint $table) {
            $table -> dropForeign('dish_restaurant_dish_id_foreign');
            $table -> dropForeign('dish_restaurant_restaurant_id_foreign');
            
            $table -> dropColumn('dish_id');
            $table -> dropColumn('restaurant_id');  
        });
    }
};
