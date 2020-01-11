<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use SEO\SchemaOrg\Models\Traits\sameAs;

class Action extends \SEO\SchemaOrg\Models\Base\Action
{
	use JsonLd;
	use sameAs;

	public function getSchemaOrgSchemaAttribute()
	{
		$additional_name = $this->additional_name ? $this->additional_name : null;

		return $this->getSchemaOrgNodeIdentifierSchemaAttribute('WebSite', true)
			// Action
			->target($this->target->urlTemplate)
			->query_inputs('queryInputs', $this->getSchemaOrgQueryInputs())
		;
	}

	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}

	public function queryInput()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\PropertyValueSpecification::class, 'target');
	}
}
