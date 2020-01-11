<?php

namespace SEO\SchemaOrg\Models;

class QuantitativeValue extends \SEO\SchemaOrg\Models\Base\QuantitativeValue
{
	protected $fillable = [
		'unit_text',
		'value'
	];
}
