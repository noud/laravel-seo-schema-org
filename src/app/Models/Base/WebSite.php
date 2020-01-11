<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WebSite
 * 
 * @property int $id
 * @property int $site_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $actions
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class WebSite extends Eloquent
{
	protected $table = 'web_site';

	protected $casts = [
		'site_id' => 'int'
	];

	public function actions()
	{
		return $this->hasMany(\SEO\SchemaOrg\Models\Action::class);
	}
}
