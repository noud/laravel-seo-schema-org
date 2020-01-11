<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use SEO\SchemaOrg\Models\Traits\sameAs;
use SEO\SchemaOrg\Models\Traits\telephone;
use Spatie\SchemaOrg\Schema;

class Organization extends \SEO\SchemaOrg\Models\Base\Organization
{
	use JsonLd;
	use sameAs;
	use telephone;
	
	protected $fillable = [
		'email',
		'name',
		'logo',
		'telephone',
		'url',
	];

	public function getSchemaOrgSchemaAttribute()
	{
		$contactPoint = [];
		foreach($this->contact_points()->get() as $contact_point) {
			$contactPoint[] = Schema::ContactPoint()
				->contactType($contact_point->contact_type)
				->email($contact_point->email)
			;
		}
		$openingHoursSpecification = [];
		if($this->place) {
			foreach($this->place->opening_hours_specifications()->get() as $opening_hours_specification) {
				$dayOfWeek = strpos($opening_hours_specification->day_of_week,',') ? explode(',',$opening_hours_specification->day_of_week) : $opening_hours_specification->day_of_week;
				$openingHoursSpecification[] = Schema::OpeningHoursSpecification()
					->closes($opening_hours_specification->closes)
					->opens($opening_hours_specification->opens)
					->dayOfWeek($dayOfWeek);
			}
		}

		// employees and founders
		$employeesSchemas = $this->getSchemaOrgPersonsHavingRole('employees', 'schema_org_schema');
		// @todo should i call schema_org_schema schema_org_embedded ?
		$foundersSchemas = $this->getSchemaOrgPersonsHavingRole('founders', 'schema_org_schema');
		if ($foundersSchemas) {
			// substract founders from employees and then add founderNodeIdentiefies (given all founders are employees)
			$foundersNodeIdentifiers = $this->getSchemaOrgPersonsHavingRole('founders', 'schema_org_node_identifier');
			$employeesSchemas = array_diff($employeesSchemas, $foundersSchemas);
			$employeesSchemasCount = array_push($employeesSchemas, ...$foundersNodeIdentifiers);
			$employeesSchemas = array_values($employeesSchemas);
		}
		$employeesSchemas = $employeesSchemas ?: null;

		$email = $this->email ? $this->email : null;
		$legal_name = $this->legal_name ? $this->legal_name : null;
		$logo = $this->logo ? $this->logo : null;
		$placeSchema = $this->place ? $this->place->schema_org_schema : null;
		$postalAddressSchema = $this->postal_address ? $this->postal_address->schema_org_schema : null;
		$telephone = $this->telephone ? $this->telephone : null;
		// Thing
		$alternate_name = $this->thing && $this->thing->alternate_name ? $this->thing->alternate_name : null;

		return $this->getSchemaOrgNodeIdentifierSchemaAttribute('Organization', true)
			->address($postalAddressSchema)
			->contactPoint($contactPoint)	// optional
			->email($email)
			->employees($employeesSchemas)
			->founders($foundersSchemas)
			->legalName($legal_name)
			->location($placeSchema)
			->logo($logo)
			->telephone($telephone)
			// Thing
			->setProperty('alternateName', $alternate_name)
			->name($this->thing->name)
			->setProperty('sameAs', $this->getSchemaOrgsameAs())
		;
	}

	public function getSchemaOrgPersonsHavingRole(string $role, string $attribute)
	{
		$organizationPersonsHavingRole = $this->$role()->get();
		$persons = null;
		foreach ($organizationPersonsHavingRole as $organizationPersonHavingRole) {
			$persons[] = $organizationPersonHavingRole->role->person->$attribute;
		}
		if (isset($persons[0]["givenName"])) {
			usort($persons, function($a, $b){ return $a["givenName"] > $b["givenName"]; });
		} elseif (isset($persons[0]["@id"])) {
			usort($persons, function($a, $b){ return $a["@id"] > $b["@id"]; });
		}
		return $persons;
	}

	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}

	public function employees()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Employee::class);
	}

	public function founders()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Founder::class);
	}
    
    public function contact_points()
	{
        return $this->morphMany(\SEO\SchemaOrg\Models\ContactPoint::class, 'owner');
	}
}
