<?php

namespace SEO\SchemaOrg\Models;

class Image extends \SEO\SchemaOrg\Models\Base\Image
{
	protected $table = 'image';
	
		// return $this->hasOne(\SEO\SchemaOrg\Models\SameA::class);
	protected $fillable = [
		'id',
		'thing_id',
		'image'
	];
}
