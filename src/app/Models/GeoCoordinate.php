<?php

namespace SEO\SchemaOrg\Models;

class GeoCoordinate extends \SEO\SchemaOrg\Models\Base\GeoCoordinate
{
	protected $fillable = [
		'latitude',
		'longitude'
	];
}
