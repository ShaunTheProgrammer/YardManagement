<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DockMaster
 * 
 * @property string $Dock ID
 * @property int|null $DocksupervisorID
 *
 * @package App\Models
 */
class DockMaster extends Model
{
	protected $table = 'dock master';
	protected $primaryKey = 'Dock ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DocksupervisorID' => 'int'
	];

	protected $fillable = [
		'DocksupervisorID'
	];
}
