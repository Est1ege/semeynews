<?php

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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            
            // Проверяем, что правильно настроена связь с таблицей news
            // Используем обычный foreign key без constrained(),
            // так как может возникнуть проблема с именем таблицы (news vs posts)
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                  ->references('id')
                  ->on('news')
                  ->onDelete('cascade');
            
            // Остальные поля
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('author_name');
            $table->string('author_email');
            $table->text('content');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
            
            // Добавляем внешний ключ для связи комментариев с родительскими
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('comments')
                  ->onDelete('cascade');
            
            // Добавляем внешний ключ для связи с пользователями
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};