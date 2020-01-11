<?php

namespace SEO\SchemaOrg\Models\Traits;

trait telephone
{
	public function getTelephoneAttribute($value)
	{
		if ('6' === substr($value,0,1)) {
			$value = substr($value,0,1) . ' ' . substr($value,1,4) . ' ' . substr($value,5,4);
		} else {
			$value = substr($value,0,2) . ' ' . substr($value,2,3) . ' ' . substr($value,5,4);
		}
		return trim($value) ? '+31 ' . $value : null;
	}
}