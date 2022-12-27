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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone');
            $table->string('subject');
            $table->string('contact_us');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->text('logo');

            $table->json('deal')->comment("['status' , 'product_id' , 'until' ,  'price' , 'title' , 'description' , 'cover']");
            $table->json('faqs')->comment("[{'faq_q' , 'faq_a'}]");
            $table->json('instagrambar')->comment("[{'title' , 'image'}]");
            $table->json('partnerbar')->comment("array of images");
            $table->json('header')->comment("[{'title' , 'cover' , 'description' , 'hint' , 'sale'}]");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
