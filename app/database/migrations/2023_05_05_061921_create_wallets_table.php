<?php

use App\Enums\Wallet\TransactionReasonEnum;

use App\Enums\Wallet\TransactionTypeEnum;
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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();

            $table->enum( 'type', array_column( TransactionTypeEnum::cases(), 'value'))
                ->index()->default(TransactionTypeEnum::INCREASE->value);

            $table->decimal('amount', 10, 2);

            $table->enum('reason', array_column( TransactionReasonEnum::cases(), 'value'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
