<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class LocalBusiness
 * 
 * @property int $id
 * @property int $organization_id
 * @property string $price_range
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Organization $organization
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class LocalBusiness extends Eloquent
{
	protected $table = 'local_business';

	protected $casts = [
		'organization_id' => 'int'
	];

	public function organization()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Organization::class);
	}
}
