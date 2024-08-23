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
        Schema::table('product', function (Blueprint $table) {
            $table->foreign(['tax_class_id'], 'product_FK_1')->references(['id'])->on('tax_class')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['accounting_group_id'], 'product_FK_4')->references(['id'])->on('accounting_group')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['virtual_table_id'], 'product_FK_5')->references(['id'])->on('virtual_table')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_id'], 'product_ibfk_1')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['event_id'], 'product_ibfk_2')->references(['id'])->on('event')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_FK_1');
            $table->dropForeign('product_FK_4');
            $table->dropForeign('product_FK_5');
            $table->dropForeign('product_ibfk_1');
            $table->dropForeign('product_ibfk_2');
        });
    }
};
