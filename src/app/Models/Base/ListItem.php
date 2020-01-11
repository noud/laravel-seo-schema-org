<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ListItem
 * 
 * @property int $id
 * @property int $list_id
 * @property string $list_type
 * @property int $item_id
 * @property string $item_type
 * @property int $position
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class ListItem extends Eloquent
{
	protected $table = 'list_item';

	protected $casts = [
		'list_id' => 'int',
		'item_id' => 'int',
		'position' => 'int'
	];
}
