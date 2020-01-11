<?php

namespace SEO\SchemaOrg\Models\Traits;

trait image
{
    public function getSchemaOrgimage()
	{
		$imageThings = $this->image()->get();
		foreach ($imageThings as $imageThing) {
			$image[] = $imageThing->image;
		}
		return $image;
	}
}