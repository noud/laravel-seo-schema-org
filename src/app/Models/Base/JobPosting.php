<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class JobPosting
 * 
 * @property int $id
 * @property int $base_salary_id
 * @property \Carbon\Carbon $date_posted
 * @property int $employment_type
 * @property int $hiring_organization_id
 * @property int $job_location
 * @property int $job_location_type
 * @property string $title
 * @property \Carbon\Carbon $valid_through
 * @property int $thing_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\MonetaryAmount $monetary_amount
 * @property \SEO\SchemaOrg\Models\Organization $organization
 * @property \SEO\SchemaOrg\Models\Place $place
 * @property \SEO\SchemaOrg\Models\Thing $thing
 * @property \Illuminate\Database\Eloquent\Collection $education_requirements
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class JobPosting extends Eloquent
{
	protected $table = 'job_posting';

	protected $casts = [
		'base_salary_id' => 'int',
		'employment_type' => 'int',
		'hiring_organization_id' => 'int',
		'job_location' => 'int',
		'job_location_type' => 'int',
		'thing_id' => 'int'
	];

	protected $dates = [
		'date_posted',
		'valid_through'
	];

	public function monetary_amount()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\MonetaryAmount::class, 'base_salary_id');
	}

	public function organization()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class, 'hiring_organization_id');
	}

	public function place()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Place::class, 'job_location');
	}

	public function thing()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Thing::class);
	}

	public function education_requirements()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\EducationRequirement::class);
	}
}
