<?php

use App\Models\Campaign\Campaign;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('code', Campaign::$MAX_CODE_LENGTH)->index()->unique();
            $table->timestamp('start_time')->nullable()->comment('Campaign start time');

            $table->timestamp('end_time')
                  ->nullable()
                  ->comment('Campaign end time,
                  equal to the start time + the time limit set by the administrator (for example, one hour)');

            $table->integer('usable_number')
                  ->default(100)
                  ->comment('The usable number of the desired campaign code');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
