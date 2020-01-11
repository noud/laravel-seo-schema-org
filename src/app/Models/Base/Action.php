<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Dec 2019 19:54:37 +0000.
 */

namespace SEO\SchemaOrg\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Action
 * 
 * @property int $id
 * @property int $web_site_id
 * @property int $action_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \SEO\SchemaOrg\Models\Action $action
 * @property \SEO\SchemaOrg\Models\WebSite $web_site
 *
 * @package SEO\SchemaOrg\Models\Base
 */
class Action extends Eloquent
{
	protected $casts = [
		'web_site_id' => 'int',
		'action_id' => 'int'
	];

	public function action()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\Action::class);
	}

	public function web_site()
	{
		return $this->belongsTo(\SEO\SchemaOrg\Models\WebSite::class);
	}
}
