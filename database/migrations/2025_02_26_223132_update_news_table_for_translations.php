<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNewsTableForTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First check if the columns are not already JSON
        if (Schema::hasColumn('news', 'title')) {
            Schema::table('news', function (Blueprint $table) {
                // Change the column type to JSON for translatable fields
                $table->json('title')->change();
                $table->json('content')->change();
                
                // If you have excerpt as a translatable field
                if (Schema::hasColumn('news', 'excerpt')) {
                    $table->json('excerpt')->nullable()->change();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            // If needed, revert back to string/text
            $table->string('title')->change();
            $table->text('content')->change();
            
            if (Schema::hasColumn('news', 'excerpt')) {
                $table->text('excerpt')->nullable()->change();
            }
        });
    }
}