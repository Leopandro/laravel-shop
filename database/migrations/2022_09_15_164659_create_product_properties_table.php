<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('property_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 16);
        });

        Schema::create('property_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('property_name_id')
                ->references('id')
                ->on('property_names')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('value', 256);
        });

        Schema::create('product_property_values', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('property_value_id')
                ->references('id')
                ->on('property_values')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
//        Schema::create('product_properties', function (Blueprint $table) {
//            $table->bigIncrements('id');
//
//            $table->foreignId('product_id')
//                ->references('id')
//                ->on('products')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//
//            $table->foreignId('property_name_id')
//                ->references('id')
//                ->on('product_property_names')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('property_values');
        Schema::dropIfExists('property_names');
        Schema::dropIfExists('product_property_values');
    }
}
