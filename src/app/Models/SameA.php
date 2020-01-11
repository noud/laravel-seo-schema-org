<?php

namespace SEO\SchemaOrg\Models;

class SameA extends \SEO\SchemaOrg\Models\Base\SameA
{
	protected $table = 'same_as';
	
	protected $fillable = [
		'id',
		'thing_id',
		'url'
	];
}
