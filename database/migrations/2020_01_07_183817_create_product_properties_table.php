<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPropertiesTable extends Migration
{
    public const TABLE_NAME = 'product_properties';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('color');
            $table->decimal('price');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on(CreateProductsTable::TABLE_NAME)
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
