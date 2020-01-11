<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\image;

class Thing extends \SEO\SchemaOrg\Models\Base\Thing
{
	use image;

	public function identifier()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\PropertyValue::class, 'identifier_id');
	}

	public function image()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Image::class);
	}
	
	public function same_as()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\SameA::class);
	}
}
