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
        if ( Schema::hasTable('configs') ) {
        Schema::table('configs', function (Blueprint $table) {
            if (!Schema::hasColumn('configs','bunny')){
                $table->boolean('bunny')->default(1);
                }
            if (!Schema::hasColumn('configs','wasabi')){
                $table->boolean('wasabi')->default(1);
                }
        });
        }
        if ( Schema::hasTable('services') ) {
            Schema::table('services', function (Blueprint $table) {
                if (!Schema::hasColumn('services','status')){
                    $table->boolean('status')->default(1);
                    }
            });
            }

        if ( Schema::hasTable('videolinks') ) {
        Schema::table('videolinks', function (Blueprint $table) {
            if (!Schema::hasColumn('videolinks','bunny_upload')){
                $table->string('bunny_upload', 191)->nullable();
                }
            if (!Schema::hasColumn('videolinks','wasabi_upload')){
                $table->string('wasabi_upload', 191)->nullable();
                }
        });
        }


        if ( Schema::hasTable('users') ) {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users','delete_request')){
                $table->boolean('delete_request')->default(1);
                }
            if (!Schema::hasColumn('users','delete_reason')){
                $table->string('delete_reason', 191)->nullable();
            }
            if (!Schema::hasColumn('users','producer_status')){
                $table->string('producer_status', 191)->nullable();
            }
        });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('configs')){
            Schema::table('configs', function (Blueprint $table) {
                $table->dropColumn('bunny');
                $table->dropColumn('wasabi');
            });
        }

        if(Schema::hasTable('videolinks')){
            Schema::table('videolinks', function (Blueprint $table) {
                $table->dropColumn('bunny_upload');
                $table->dropColumn('wasabi_upload');
            });
        }

        if(Schema::hasTable('users')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('otp');
                $table->dropColumn('delete_request');
                $table->dropColumn('delete_reason');
            });
        }

    }
};
