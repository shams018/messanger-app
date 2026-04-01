<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
   Schema::table('messages', function (Blueprint $table) {
    $table->text('message')->nullable()->change(); // make existing column nullable
    $table->string('image')->nullable()->after('message'); // add image column if not exists
});
}

public function down(): void
{
    Schema::table('messages', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}
};