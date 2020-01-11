<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EntryPoint
 * 
 * @property int $id
 * @property string $url_template
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $search_actions
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class EntryPoint extends Eloquent
{
	protected $table = 'entry_point';

	public function search_actions()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\SearchAction::class, 'target');
	}
}
