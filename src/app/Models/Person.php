<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use SEO\SchemaOrg\Models\Traits\sameAs;
use SEO\SchemaOrg\Models\Traits\telephone;

class Person extends \SEO\SchemaOrg\Models\Base\Person
{
	use JsonLd;
	use sameAs;
	use telephone;
	
	protected $fillable = [
		'given_name',
		'family_name',
		'email',
		'telephone'
	];

	public function getSchemaOrgSchemaAttribute()
	{
		$additional_name = $this->additional_name ? $this->additional_name : null;

		return $this->getSchemaOrgNodeIdentifierSchemaAttribute('Person', true)
			->additionalName($additional_name)
			->birthDate($this->birth_date)	// optional
			->email($this->email)
			->familyName($this->family_name)
			->givenName($this->given_name)
			->telephone($this->telephone)
			// Thing
			->setProperty('sameAs', $this->getSchemaOrgsameAs())
		;
	}

	public function getNameAttribute()
	{
		return trim($this->given_name . ' '. $this->additional_name) . ' ' . $this->family_name;
	}

	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}

	// Node Identifier

	public function getSchemaOrgNodeIdentifierSchema()
	{
		return $this->getSchemaOrgNodeIdentifierSchemaAttribute('Person');
	}
}
