<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Schema DB connection
use Illuminate\Support\Facades\Schema;
//Add a mapping for the polymorphic relationships
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //Fixing "SQLSTATE[42000] - key was too long"
         Schema::defaultStringLength(191);
         Relation::morphMap([
            'address' => 'App\Address',
            'attribute' => 'App\Attribute',
            'attribute_date_value' => 'App\AttributeDateValue',
            'attribute_double_value' => 'App\AttributeDoubleValue',
            'attribute_lang' => 'App\AttributeLang',
            'attribute_value' => 'App\AttributeValue',
            'attribute_varchar_value' => 'App\AttributeVarcharValue',
            'attribute_varchar_value_lang' => 'App\AttributeVarcharValueLang',
            'bundle' => 'App\Bundle',
            'bundle_lang' => 'App\BundleLang',
            'business' => 'App\Business',
            'category' => 'App\Category',
            'category_lang' => 'App\CategoryLang',
            'claim' => 'App\Claim',
            'claim_message' => 'App\ClaimMessage',
            'country' => 'App\Country',
            'detail' => 'App\Detail',
            'detail_lang' => 'App\DetailLang',
            'detail_value' => 'App\DetailValue',
            'detail_value_lang' => 'App\DetailValueLang',
            'discount' => 'App\Discount',
            'discount_lang' => 'App\DiscountLang',
            'language' => 'App\Language',
            'order' => 'App\Order',
            'particular_client' => 'App\ParticularClient',
            'partner' => 'App\Partner',
            'permission' => 'App\Permission',
            'permission_lang' => 'App\PermissionLang',
            'phone' => 'App\Phone',
            'picture' => 'App\Picture',
            'pin' => 'App\Pin',
            'product' => 'App\Product',
            'product_lang' => 'App\ProductLang',
            'profile' => 'App\Profile',
            'profile_lang' => 'App\ProfileLang',
            'reason' => 'App\Reason',
            'reason_lang' => 'App\ReasonLang',
            'staff' => 'App\Staff',
            'status' => 'App\Status',
            'subject' => 'App\Subject',
            'subject_lang' => 'App\SubjectLang',
            'tag' => 'App\Tag',
            'tag_lang' => 'App\TagLang',
            'ClaimNotification' => 'App\Notifications\ClaimNotification',
         ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
