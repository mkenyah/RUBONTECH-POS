
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('receipt_items', function (Blueprint $table) {
            DB::statement('ALTER TABLE receipt_items DROP COLUMN id');
        });

        Schema::table('receipt_items', function (Blueprint $table) {
            $table->bigIncrements('id')->first();
        });
    }

    public function down(): void
    {
        Schema::table('receipt_items', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
