<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use SEO\SchemaOrg\Models\Traits\actions;
use Spatie\SchemaOrg\Schema;

class WebSite extends \SEO\SchemaOrg\Models\Base\WebSite
{
	use JsonLd;
	use actions;

	protected $fillable = [
		'thing_id'
	];

	public function getSchemaOrgSchemaAttribute()
	{
		return $this->getSchemaOrgNodeIdentifierSchemaAttribute('WebSite', true)
			// Thing
			->name($this->site->thing->name)
		;
	}

	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}

	public function action()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Action::class);
	}
}
