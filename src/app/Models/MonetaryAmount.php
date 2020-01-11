<?php

namespace SEO\SchemaOrg\Models;

class MonetaryAmount extends \SEO\SchemaOrg\Models\Base\MonetaryAmount
{
	protected $fillable = [
		'currency',
		'value_id'
	];

	public function value()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\QuantitativeValue::class, 'value_id');
	}
}
