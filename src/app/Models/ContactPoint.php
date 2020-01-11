<?php

namespace SEO\SchemaOrg\Models;

class ContactPoint extends \SEO\SchemaOrg\Models\Base\ContactPoint
{
	protected $fillable = [
		'contact_type',
		'email',
		'telephone',
		'owner_id',
		'owner_type'
	];

	public function owner()
	{
		return $this->morphTo();
	}
}
