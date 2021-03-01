<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VehicleTypeMaster
 *
 * @property string $Vehicle Type ID
 *
 * @package App\Models
 */
class VehicleTypeMaster extends Model
{
	protected $table = 'vehicle type master';
	protected $primaryKey = 'vehicletypeid';
	public $incrementing = false;
	public $timestamps = false;
}
