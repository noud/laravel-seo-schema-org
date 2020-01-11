<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use Spatie\SchemaOrg\Schema;

class Place extends \SEO\SchemaOrg\Models\Base\Place
{
	use JsonLd;

	protected $fillable = [
		'address_id',
		'geo_id'
	];

	public function getSchemaOrgSchemaAttribute()
	{
		$postalAddressSchema = $this->postal_address ? $this->postal_address->schema_org_schema : null;

		$place = Schema::Place()
			->address($postalAddressSchema)
		;
		return $place;
	}
	
	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}
}
