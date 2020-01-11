<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SearchAction
 * 
 * @property int $id
 * @property string $query
 * @property int $target
 * @property int $action_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Action $action
 * @property \SEO\SchemaOrg\Models\EntryPoint $entry_point
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class SearchAction extends Eloquent
{
	protected $table = 'search_action';

	protected $casts = [
		'target' => 'int',
		'action_id' => 'int'
	];

	public function action()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Action::class);
	}

	public function entry_point()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\EntryPoint::class, 'target');
	}
}
