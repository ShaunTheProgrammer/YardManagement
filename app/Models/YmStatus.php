<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class YmStatus
 * 
 * @property int $idym_status
 * @property string|null $Status
 *
 * @package App\Models
 */
class YmStatus extends Model
{
	protected $table = 'ym_status';
	protected $primaryKey = 'idym_status';
	public $timestamps = false;

	protected $fillable = [
		'Status'
	];
}
