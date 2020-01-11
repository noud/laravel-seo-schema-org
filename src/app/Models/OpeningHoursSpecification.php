<?php

namespace SEO\SchemaOrg\Models;

class OpeningHoursSpecification extends \SEO\SchemaOrg\Models\Base\OpeningHoursSpecification
{
	protected $fillable = [
		'closes',
		'day_of_week',
		'opens',
		'place_id'
	];

	protected $dates = [
	];
}
