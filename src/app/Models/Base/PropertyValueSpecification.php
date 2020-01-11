<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PropertyValueSpecification
 * 
 * @property int $id
 * @property string $value_name
 * @property bool $value_required
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $search_action_googles
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class PropertyValueSpecification extends Eloquent
{
	protected $table = 'property_value_specification';

	protected $casts = [
		'value_required' => 'bool'
	];
}
