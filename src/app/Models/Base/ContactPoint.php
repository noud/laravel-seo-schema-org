<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ContactPoint
 * 
 * @property int $id
 * @property string $contact_type
 * @property string $email
 * @property string $telephone
 * @property int $owner_id
 * @property string $owner_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $postal_addresses
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class ContactPoint extends Eloquent
{
	protected $table = 'contact_point';

	protected $casts = [
		'owner_id' => 'int'
	];

	public function postal_addresses()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\PostalAddress::class);
	}
}
