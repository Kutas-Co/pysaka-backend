<?php

use App\Models\Game;
use App\Models\Round;
use App\Models\User;
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
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'author_id');
            $table->foreignIdFor(Game::class)->nullable();
            $table->text('text');
            $table->string('excerpt', 1000)->nullable();
            $table->unsignedSmallInteger('excerpt_length')->default(0);
            $table->foreignIdFor(Round::class,'prev_round_id')->nullable();
            $table->string('status', 50)->default(Round::STATUS_DRAFT);
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
        Schema::dropIfExists('rounds');
    }
};
