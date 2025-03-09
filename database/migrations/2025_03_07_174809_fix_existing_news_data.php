<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixExistingNewsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Get all news items
        $news = DB::table('news')->get();
        
        // Check if excerpt column exists
        $hasExcerptColumn = Schema::hasColumn('news', 'excerpt');

        foreach ($news as $item) {
            // Convert existing string values to JSON format
            $titleJson = json_encode(['ru' => $item->title]);
            $contentJson = json_encode(['ru' => $item->content]);
            
            // Only process excerpt if the column exists
            $updateData = [
                'title' => $titleJson,
                'content' => $contentJson,
            ];
            
            // Only add excerpt to update if the column exists
            if ($hasExcerptColumn && property_exists($item, 'excerpt')) {
                $updateData['excerpt'] = $item->excerpt ? json_encode(['ru' => $item->excerpt]) : null;
            }

            // Update the record
            DB::table('news')
                ->where('id', $item->id)
                ->update($updateData);
        }

        // Do the same for categories if needed
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This is risky to revert as it may lose data
    }
}