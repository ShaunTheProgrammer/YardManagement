<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class YmWarehouse
 * 
 * @property int $idWarehouse
 * @property string $Warehousename
 * @property string|null $Address
 * @property string|null $Telephone
 * @property string|null $Status
 * 
 * @property Collection|YmGateentry[] $ym_gateentries
 *
 * @package App\Models
 */
class YmWarehouse extends Model
{
	protected $table = 'ym_warehouse';
	protected $primaryKey = 'idWarehouse';
	public $timestamps = false;

	protected $fillable = [
		'Warehousename',
		'Address',
		'Telephone',
		'Status'
	];

	public function ym_gateentries()
	{
		return $this->hasMany(YmGateentry::class, 'idWarehouse');
	}
}
