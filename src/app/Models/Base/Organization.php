<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Organization
 * 
 * @property int $id
 * @property int $address_id
 * @property string $email
 * @property string $legal_name
 * @property int $location_id
 * @property string $logo
 * @property string $telephone
 * @property int $thing_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\PostalAddress $postal_address
 * @property \SEO\SchemaOrg\Models\Place $place
 * @property \SEO\SchemaOrg\Models\Thing $thing
 * @property \Illuminate\Database\Eloquent\Collection $creative_works
 * @property \SEO\SchemaOrg\Models\Employee $employee
 * @property \SEO\SchemaOrg\Models\Founder $founder
 * @property \Illuminate\Database\Eloquent\Collection $job_postings
 * @property \Illuminate\Database\Eloquent\Collection $local_businesses
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Organization extends Eloquent
{
	protected $table = 'organization';

	protected $casts = [
		'address_id' => 'int',
		'location_id' => 'int',
		'thing_id' => 'int'
	];

	public function postal_address()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\PostalAddress::class, 'address_id');
	}

	public function place()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Place::class, 'location_id');
	}

	public function thing()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Thing::class);
	}

	public function creative_works()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\CreativeWork::class, 'publisher_id');
	}

	public function employee()
	{
		return $this->hasOne(\SEO\SchemaOrg\Models\Employee::class);
	}

	public function founder()
	{
		return $this->hasOne(\SEO\SchemaOrg\Models\Founder::class);
	}

	public function job_postings()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\JobPosting::class, 'hiring_organization_id');
	}

	public function local_businesses()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\LocalBusiness::class);
	}
}
