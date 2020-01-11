<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Person
 * 
 * @property int $id
 * @property string $additional_name
 * @property int $address_id
 * @property \Carbon\Carbon $birth_date
 * @property string $email
 * @property string $family_name
 * @property string $given_name
 * @property string $telephone
 * @property int $thing_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\PostalAddress $postal_address
 * @property \SEO\SchemaOrg\Models\Thing $thing
 * @property \Illuminate\Database\Eloquent\Collection $creative_works
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Person extends Eloquent
{
	protected $table = 'person';

	protected $casts = [
		'address_id' => 'int',
		'thing_id' => 'int'
	];

	protected $dates = [
		'birth_date'
	];

	public function postal_address()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\PostalAddress::class, 'address_id');
	}

	public function thing()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Thing::class);
	}

	public function creative_works()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\CreativeWork::class, 'author_id');
	}

	public function roles()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Role::class);
	}
}
