<?php

namespace SEO\SchemaOrg\Models;

class PropertyValue extends \SEO\SchemaOrg\Models\Base\PropertyValue
{
	protected $fillable = [
		'value',
		'thing_id'
	];
}
