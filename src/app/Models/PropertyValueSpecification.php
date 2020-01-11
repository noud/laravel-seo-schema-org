<?php

namespace SEO\SchemaOrg\Models;

class PropertyValueSpecification extends \SEO\SchemaOrg\Models\Base\PropertyValueSpecification
{
	protected $fillable = [
		'value_name',
		'value_required'
	];
}
