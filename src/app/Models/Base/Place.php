<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Place
 * 
 * @property int $id
 * @property int $address_id
 * @property int $geo_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\PostalAddress $postal_address
 * @property \SEO\SchemaOrg\Models\GeoCoordinate $geo_coordinate
 * @property \Illuminate\Database\Eloquent\Collection $job_postings
 * @property \Illuminate\Database\Eloquent\Collection $opening_hours_specifications
 * @property \Illuminate\Database\Eloquent\Collection $organizations
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Place extends Eloquent
{
	protected $table = 'place';

	protected $casts = [
		'address_id' => 'int',
		'geo_id' => 'int'
	];

	public function postal_address()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\PostalAddress::class, 'address_id');
	}

	public function geo_coordinate()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\GeoCoordinate::class, 'geo_id');
	}

	public function job_postings()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\JobPosting::class, 'job_location');
	}

	public function opening_hours_specifications()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\OpeningHoursSpecification::class);
	}

	public function organizations()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Organization::class, 'location_id');
	}
}
