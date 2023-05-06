<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaign_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();


            $table->unsignedBigInteger('campaign_id')->index();
            $table->foreign('campaign_id')->on('campaigns')
                                          ->references('id')
                                          ->cascadeOnDelete();

            $table->unique(['user_id', 'campaign_id']);

        });



        //create trigger to increase the value of used_number after each time
        //adding a new row related to the desired campaign
        DB::unprepared('CREATE TRIGGER update_campaign_used_number
                AFTER INSERT ON campaign_user
                FOR EACH ROW
            BEGIN
                UPDATE campaigns
                SET used_number = used_number + 1
                WHERE id = NEW.campaign_id;
            END');


    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_user');
    }
};
