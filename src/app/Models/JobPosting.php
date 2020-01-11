<?php

namespace SEO\SchemaOrg\Models;

use SEO\SchemaOrg\Models\Traits\JsonLd;
use SEO\SchemaOrg\Models\Traits\sameAs;
use SEO\Models\Traits\Slug;
use Spatie\SchemaOrg\Schema;

class JobPosting extends \SEO\SchemaOrg\Models\Base\JobPosting
{
	use JsonLd;
	use sameAs;
    use Slug;
	
	protected $fillable = [
		'title',
	];
	
	public function generateSlug() {
		$urlParts = explode('/', $this->url);
		end($urlParts);
		return prev($urlParts);
	}

	public function getSchemaOrgSchemaAttribute()
	{
		$baseSalary = null;
		if ($this->base_salary) {
			$value = Schema::QuantitativeValue()->unitText($this->base_salary->value->unit_text)->value($this->base_salary->value->value);
			$baseSalary = Schema::MonetaryAmount()->currency($this->base_salary->currency)->value($value);
		}
		$educationRequirements = null;
		if ($this->minimum_educational_level && $this->maximum_educational_level) {
			$educationRequirements = [
				$this->minimum_educational_level->name,
				// @todo and in between
				$this->maximum_educational_level->name,
			];
		};
		// @todo ENUM
		$employmentType = null;
		$employmentTypes = [	// Google
			'FULL_TIME',
            'PART_TIME',
            'CONTRACTOR',
			'TEMPORARY',
			'INTERN',
			"VOLUNTEER",
			"PER_DIEM",
			"OTHER",
		];
		// $employmentTypes = [	// Schema.org
		// 	'full-time',
		// 	'part-time',
		// 	'contract',
		// 	'temporary',
		// 	'seasonal',
		// 	'internship',
		// ];
		// @todo $employmentType = [$employmentType, $employmentType];
		$employmentType = isset($this->employment_type) ? $employmentTypes[$this->employment_type] : null;
		// Organization
		// $person = null;
		// if ($this->responsible_user) {
		// 	$person = Schema::Person()
		// 		->givenName($this->responsible_user->profile->first_name)
		// 		->familyName($this->responsible_user->profile->surname)
		// 		->email($this->responsible_user->email)
		// 		->telephone($this->responsible_user->profile->tel);
		// }
		$hiringOrganization = null;	// @todo check if manditory
		if ($this->organization) {
			$hiringOrganization = Schema::Organization()
				// ->employee($this->organization->getSchemaOrgEmployee())
				->logo($this->organization->logo)
				->telephone($this->organization->telephone)
				// Thing
				->url($this->organization->thing->url)
				->name($this->organization->thing->name)
			;
		}
		$identifier = null;
		if ($this->thing->identifier) {
			$identifier = Schema::PropertyValue()
				->value($this->thing->identifier->value)
				// Thing
				->name($this->thing->identifier->thing->name)
			;
		}
		$jobLocation = null;	// @todo check if manditory
		if ($this->job_location) {
			$address = Schema::PostalAddress()
				->streetAddress($this->place->postal_address->street_address)
				->addressLocality($this->place->postal_address->address_locality)
				->addressRegion($this->place->postal_address->address_region)	// Google advised
				->postalCode($this->place->postal_address->postal_code)
				->addressCountry($this->place->postal_address->address_country)
			;
			$jobLocation = Schema::Place()->address($address);
		}
		$jobLocationType = null;
		$jobLocationTypes = [
			'TELECOMMUTE',	// Google
		];
		$jobLocationType = isset($this->job_location_type) ? $jobLocationTypes[$this->job_location_type] : null;

		return $this->getSchemaOrgNodeIdentifierSchemaAttribute('JobPosting', true)
			->baseSalary($baseSalary)	// Google advised
			->datePosted($this->date_posted)
			// ->educationRequirements($educationRequirements)
			->employmentType($employmentType)
			->hiringOrganization($hiringOrganization)
			->jobLocation($jobLocation)
			->jobLocationType($jobLocationType)
			->title($this->title)	// jobTitle
			->validThrough($this->valid_through)	// Google advised
			// Thing
			->description($this->thing->description)
			->identifier($identifier)	// optional
			->name($this->thing->name)
		;
	}
	
	public function getUrlAttribute()
	{
		return $this->thing->url;
	}
	
	public function base_salary()
	{
		return $this->monetary_amount();
	}

	public function getSchemaOrgSchema()
	{
		return $this->getSchemaOrgSchemaAttribute();
	}
}
