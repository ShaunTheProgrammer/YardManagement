<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityMaster
 * 
 * @property string $Activity Type ID
 *
 * @package App\Models
 */
class ActivityMaster extends Model
{
	protected $table = 'activity master';
	protected $primaryKey = 'ActivityTypeID';
	public $incrementing = false;
	public $timestamps = false;
}
