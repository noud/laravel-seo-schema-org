<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use Spatie\SchemaOrg\Schema;

class PostalAddress extends \SEO\SchemaOrg\Models\Base\PostalAddress
{
	use JsonLd;
	
	protected $fillable = [
		'address_country',
		'address_locality',
		'address_region',
		'post_office_box_number',
		'postal_code',
		'street_address'
	];

	public function getSchemaOrgSchemaAttribute()
	{
		$postalAddress = Schema::PostalAddress()
			->streetAddress($this->street_address)
			->postalCode($this->postal_code)
			->addressLocality($this->address_locality)
			->addressCountry($this->address_country)
		;
		return $postalAddress;
	}

	public function getPostalCodeAttribute($value)
	{
		return substr($value,0,4) . ' ' . substr($value,4,2);
	}
	
	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}
}
