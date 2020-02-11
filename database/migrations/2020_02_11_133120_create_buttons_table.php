<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link');
            $table->string('color');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('buttons')->insert(
            array([
                'title' => 'button 1',
                'link' => 'http://google.com',
                'color' => '#75a50f'                
            ],
            [
                'title' => 'button 2',
                'link' => 'http://google.com',
                'color' => '#938bf3'                
            ],
            [
                'title' => 'name@domain.com',
                'link' => 'true',
                'color' => '#7eb2f7'                
            ],
            [
                'title' => 'button 1',
                'link' => 'http://google.com',
                'color' => '#75a50f'                
            ],
            [
                'title' => 'button 2',
                'link' => 'http://google.com',
                'color' => '#938bf3'                
            ],
            [
                'title' => 'name@domain.com',
                'link' => 'true',
                'color' => '#7eb2f7'                
            ],
            [
                'title' => 'button 1',
                'link' => 'http://google.com',
                'color' => '#75a50f'                
            ],
            [
                'title' => 'button 2',
                'link' => 'http://google.com',
                'color' => '#938bf3'                
            ],
            [
                'title' => 'name@domain.com',
                'link' => 'true',
                'color' => '#7eb2f7'                
            ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buttons');
    }
}
