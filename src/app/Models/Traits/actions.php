<?php

namespace SEO\SchemaOrg\Models\Traits;

trait actions
{
    private function getSchemaOrgactions()
	{
		$actions = null;
		$thing = $this->web_site()->get()->first();
		if ($thing) {
			$actionsWebSite = $web_site->action()->get();
			foreach ($actionsWebSite as $actionsWebSite) {
				$actions[] = $actionsWebSite->action->potentianlAction;
			}
		}
		return $actions;
	}
}