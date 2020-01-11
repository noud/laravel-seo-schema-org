<?php

namespace SEO\SchemaOrg\Models\Traits;

use Spatie\SchemaOrg\Schema;

trait JsonLd
{
    private $jsonLd = [];

	public function getSchemaOrgNodeIdentifierSchemaAttribute(string $type, bool $withUrl = false)
	{
		if (!in_array($type, ['WebSite','WebSiteGoogle'])) {
			$url = $this->thing && $this->thing->url ? $this->thing->url : null;
		} else {
			$url = $this->site->thing && $this->site->thing->url ? $this->site->thing->url : null;
		}
		$schema = Schema::$type()->setProperty('@id', isset($url) ? $url . '/#' . strtolower($type) : null);
		if ($withUrl) {
			$schema = $schema->setProperty('url', $url);
		}
		return $schema;
	}

	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}

	public function getSchemaOrgAttribute()
	{
		return $this->getSchemaOrg($this->getSchemaOrgAsArray(), false, false);
	}

	public function getSchemaOrgEmbeddedAttribute()
	{
		// @todo if embedded script is always false
		return $this->getSchemaOrg($this->getSchemaOrgAsArray(), true, false);
	}

	public function getSchemaOrgScriptAttribute()
	{
		return $this->getSchemaOrg($this->getSchemaOrgAsArray(), false, true);
    }
	
    public function getSchemaOrgAsArray()
	{
        $person = $this->getSchemaOrgSchema();
		return $person->toArray();
    }

    public function getSchemaOrg(array $jsonLd, bool $embedded = false, bool $script = true, bool $prettyPrint = true)
    {
        $this->jsonLd = $jsonLd;
    	$jsonLd = $this->SchemaOrgtoJson($embedded, $prettyPrint);
    	if ($script) {
    		$jsonLd = "<script type='application/ld+json'>{$jsonLd}</script>";
    	}
    	return $jsonLd;
    }

    public function SchemaOrgtoJson(bool $embedded = false, bool $prettyPrint = true)
    {
    	$jsonLd = $this->jsonLd;
		if ($embedded) {
			unset($jsonLd["@context"]);
		}
		if ($prettyPrint) {
			$jsonEncode = json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
		} else {
			$jsonEncode = json_encode($jsonLd, JSON_UNESCAPED_SLASHES);
		}
		return $jsonEncode;
	}
	
	// Node Identifier

	public function getSchemaOrgNodeIdentifier()
	{
		return $this->getSchemaOrgNodeIdentifierAttribute();
	}

	public function getSchemaOrgNodeIdentifierSchema()
	{
		return $this->getSchemaOrgNodeIdentifierSchemaAttribute();
	}

	public function getSchemaOrgNodeIdentifierAttribute()
	{
		return $this->getSchemaOrgNodeIdentifierAsArray();
		//return $this->getSchemaOrg($this->getSchemaOrgNodeIdentifierAsArray(), true, false, true);

	}

    public function getSchemaOrgNodeIdentifierAsArray()
	{
		$person = $this->getSchemaOrgNodeIdentifierSchema()->toArray();
		unset($person["@context"]);
		return $person;
	}
}