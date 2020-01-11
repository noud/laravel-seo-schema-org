<?php

namespace SEO\SchemaOrg\Models\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

trait MorphMap
{
    protected static function boot()
    {
        static::bootTraits();

        static::loadMorphMap();
    }

    protected static function loadMorphMap()
    {
        Relation::morphMap([
            'breadcrumb_list' => 'SEO\SchemaOrg\Models\BreadcrumbList',
            'item_list' => 'SEO\SchemaOrg\Models\ItemList',
        ]);
    }
}