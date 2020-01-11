<?php

namespace SEO\SchemaOrg\Models;

class ListItem extends \SEO\SchemaOrg\Models\Base\ListItem
{
	protected $fillable = [
		'list_id',
		'list_type',
		'position',
		'item_id',
		'item_type'
	];

	public function list()
	{
		return $this->morphTo();
	}
	
	public function item()
	{
		return $this->morphTo();
	}
}
