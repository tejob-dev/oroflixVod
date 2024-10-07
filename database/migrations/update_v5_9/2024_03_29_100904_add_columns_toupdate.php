<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUpdate extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        if ( Schema::hasTable('configs') ) {
        Schema::table('configs', function (Blueprint $table) {
            if (!Schema::hasColumn('configs','worldpay_payment')){
                $table->boolean('worldpay_payment')->default(1);
                }
            if (!Schema::hasColumn('configs','squarepay_payment')){
                $table->boolean('squarepay_payment')->default(1);
                }
            if (!Schema::hasColumn('configs','api_enable')){
                $table->boolean('api_enable')->default(1);
                }
            if (!Schema::hasColumn('configs','api_key')){
                    $table->string('api_key',225)->default(0);
                }
            if (!Schema::hasColumn('configs','twilio_enable')){
                    $table->string('twilio_enable',1)->default(0);
                }
        });
        }

        if ( Schema::hasTable('subscriptions') ) {
        Schema::table('subscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('subscriptions','type')){
                    $table->string('type',225);
                }
            if (!Schema::hasColumn('subscriptions','stripe_price')){
                    $table->string('stripe_price',225);
                }
            if (!Schema::hasColumn('subscriptions','stripe_product')){
                    $table->string('stripe_product',225);
                }
        });
        }

        if ( Schema::hasTable('subscription_items') ) {
        Schema::table('subscription_items', function (Blueprint $table) {
            if (!Schema::hasColumn('subscription_items','stripe_product')){
                    $table->string('stripe_product',225);
                }
            if (!Schema::hasColumn('subscription_items','stripe_price')){
                    $table->string('stripe_price',225);
                }
        });
        }

        if ( Schema::hasTable('users') ) {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users','pm_type')){
                    $table->string('pm_type',225);
                }
            if (!Schema::hasColumn('users','pm_last_four')){
                    $table->string('pm_last_four',4);
                }
        });
        }

        if ( Schema::hasTable('authentication_log') ) {
        Schema::table('authentication_log', function (Blueprint $table) {
            if (!Schema::hasColumn('authentication_log','user_agent')){
                    $table->string('user_agent',225);
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
                $table->dropColumn('worldpay_payment');
                $table->dropColumn('squarepay_payment');
                $table->dropColumn('api_enable');
                $table->dropColumn('api_key');
                $table->dropColumn('twilio_enable');
            });
        }

        if(Schema::hasTable('subscriptions')){
            Schema::table('subscriptions', function (Blueprint $table) {
                $table->dropColumn('type');
                $table->dropColumn('stripe_price');
                $table->dropColumn('stripe_product');
            });
        }

         if(Schema::hasTable('subscription_items')){
            Schema::table('subscription_items', function (Blueprint $table) {
                $table->dropColumn('stripe_price');
                $table->dropColumn('stripe_product');
            });
        }

        if(Schema::hasTable('users')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('pm_type');
                $table->dropColumn('pm_last_four');
            });
        }

        if(Schema::hasTable('authentication_log')){
            Schema::table('authentication_log', function (Blueprint $table) {
                $table->dropColumn('user_agent');
            });
        }
    }
};
