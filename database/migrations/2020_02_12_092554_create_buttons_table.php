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
            $table->string('link')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('buttons')->insert(
            array([
                'title' => 'Google',
                'link' => 'https://google.com',
                'color' => '#75a50f'                
            ],
            [
                'title' => 'Facebook',
                'link' => 'https://facebook.com',
                'color' => '#938bf3'                
            ],
            [
                'title' => 'Not set',
                'link' => '',
                'color' => '#e3661b'                
            ],
            [
                'title' => 'Linkedin',
                'link' => 'https://linkedin.com',
                'color' => '#5b0f2e'                
            ],
            [
                'title' => 'Not set',
                'link' => '',
                'color' => '#e3661b'                
            ],
            [
                'title' => 'Not set',
                'link' => '',
                'color' => '#e3661b'                
            ],
            [
                'title' => 'Twitter',
                'link' => 'https://twitter.com',
                'color' => '#ecaeb6'                
            ],
            [
                'title' => 'Instagram',
                'link' => 'https://instagram.com',
                'color' => '#edc015'                
            ],
            [
                'title' => 'Not set',
                'link' => '#94914e',
                'color' => '#e3661b'                
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
