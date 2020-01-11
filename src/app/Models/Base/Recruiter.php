<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 20:54:40 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Recruiter
 * 
 * @property int $id
 * @property int $organization_id
 * @property int $recruiter_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Organization $organization
 * @property \SEO\SchemaOrg\Models\Recruiter $recruiter
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Recruiter extends Eloquent
{
	protected $casts = [
		'organization_id' => 'int',
		'recruiter_id' => 'int'
	];

	public function organization()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class);
	}

	public function recruiter()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Recruiter::class);
	}
}
