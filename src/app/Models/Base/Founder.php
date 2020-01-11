<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Founder
 * 
 * @property int $id
 * @property int $organization_id
 * @property int $founder_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Founder $founder
 * @property \SEO\SchemaOrg\Models\Organization $organization
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Founder extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'organization_id' => 'int',
		'founder_id' => 'int'
	];

	public function founder()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Founder::class);
	}

	public function organization()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class);
	}
}
