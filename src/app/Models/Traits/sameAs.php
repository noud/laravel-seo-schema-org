<?php

namespace SEO\SchemaOrg\Models\Traits;

trait sameAs
{
    private function getSchemaOrgsameAs()
	{
		$sameAs = null;
		$thing = $this->thing()->get()->first();
		if ($thing) {
			$sameAsThings = $thing->same_as()->get();
			foreach ($sameAsThings as $sameAsThing) {
				$sameAs[] = $sameAsThing->url;
			}
		}
		return $sameAs;
	}
}