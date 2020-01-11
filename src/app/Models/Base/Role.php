<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property int $person_id
 * @property int $roleable_id
 * @property string $roleable_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Person $person
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Role extends Eloquent
{
	protected $table = 'role';

	protected $casts = [
		'person_id' => 'int',
		'roleable_id' => 'int'
	];

	public function person()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Person::class);
	}
}
