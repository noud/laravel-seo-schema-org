<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PostalAddress
 * 
 * @property int $id
 * @property string $address_country
 * @property string $address_locality
 * @property string $address_region
 * @property string $post_office_box_number
 * @property string $postal_code
 * @property string $street_address
 * @property int $contact_point_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\ContactPoint $contact_point
 * @property \Illuminate\Database\Eloquent\Collection $organizations
 * @property \Illuminate\Database\Eloquent\Collection $people
 * @property \Illuminate\Database\Eloquent\Collection $places
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class PostalAddress extends Eloquent
{
	protected $table = 'postal_address';

	protected $casts = [
		'contact_point_id' => 'int'
	];

	public function contact_point()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\ContactPoint::class);
	}

	public function organizations()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Organization::class, 'address_id');
	}

	public function people()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Person::class, 'address_id');
	}

	public function places()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Place::class, 'address_id');
	}
}
