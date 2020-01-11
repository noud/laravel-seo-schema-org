<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Thing
 * 
 * @property int $id
 * @property string $alternate_name
 * @property string $description
 * @property string $name
 * @property string $url
 * @property int $identifier_id
 * @property string $main_entity_of_page
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\PropertyValue $property_value
 * @property \Illuminate\Database\Eloquent\Collection $creative_works
 * @property \Illuminate\Database\Eloquent\Collection $images
 * @property \Illuminate\Database\Eloquent\Collection $job_postings
 * @property \Illuminate\Database\Eloquent\Collection $organizations
 * @property \Illuminate\Database\Eloquent\Collection $people
 * @property \Illuminate\Database\Eloquent\Collection $property_values
 * @property \SEO\SchemaOrg\Models\SameA $same_a
 * @property \Illuminate\Database\Eloquent\Collection $sites
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Thing extends Eloquent
{
	protected $table = 'thing';

	protected $casts = [
		'identifier_id' => 'int'
	];

	public function property_value()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\PropertyValue::class, 'identifier_id');
	}

	public function creative_works()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\CreativeWork::class);
	}

	public function images()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Image::class);
	}

	public function job_postings()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\JobPosting::class);
	}

	public function organizations()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Organization::class);
	}

	public function people()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Person::class);
	}

	public function property_values()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\PropertyValue::class);
	}

	public function same_a()
	{
		return $this->hasOne(\SEO\SchemaOrg\Models\SameA::class);
	}
}
