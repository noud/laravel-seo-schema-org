<?php

namespace SEO\SchemaOrg\Models;

class CreativeWork extends \SEO\SchemaOrg\Models\Base\CreativeWork
{
	protected $fillable = [
		'author_id',
		'publisher_id',
		'date_modified',
		'date_published',
		'headline',
		'thing_id'
	];

	public function author()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Person::class, 'author_id');
	}

	public function publisher()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class, 'publisher_id');
	}
}
