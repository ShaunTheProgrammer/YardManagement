<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 *
 * @property string $vehicleid
 * @property string|null $vehicletypeid
 * @property string $drivername
 * @property string $drivermobile
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	protected $table = 'vehicle';
	protected $primaryKey = 'vehicleid';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'vehicleid',
		'vehicletypeid',
		'drivername',
		'drivermobile'
	];
}
