<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class YmGateentry
 * 
 * @property int $idgateentry
 * @property int|null $idWarehouse
 * @property Carbon $gateindate
 * @property Carbon $gateintime
 * @property Carbon|null $gateout
 * @property string|null $vehiclenumber
 * @property string|null $vehicletype
 * @property string|null $drivername
 * @property string|null $drivermobilnumber
 * @property string|null $activitytype
 * @property int|null $noofboxes
 * @property bool|null $Paperchecked
 * @property bool|null $vehicleinspected
 * @property string|null $assignedtodock
 * @property string|null $docksupervisorname
 * @property Carbon|null $dockin
 * @property Carbon|null $dockout
 * @property string|null $status
 * @property string|null $createdby
 * @property Carbon|null $createdon
 * @property string|null $updateby
 * @property Carbon|null $updatedon
 * 
 * @property Userdatum $userdatum
 * @property YmWarehouse $ym_warehouse
 *
 * @package App\Models
 */
class YmGateentry extends Model
{
	protected $table = 'ym_gateentry';
	protected $primaryKey = 'idgateentry';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idgateentry' => 'int',
		'idWarehouse' => 'int',
		'noofboxes' => 'int',
		'actualboxes'=> 'int',
		'Paperchecked' => 'bool',
		'vehicleinspected' => 'bool'
	];

	protected $dates = [
		'gateindate',
		'gateintime',
		'gateout',
		'dockin',
		'dockout',
		'createdon',
		'updatedon'
	];

	protected $fillable = [
		'idWarehouse',
		'gateindate',
		'gateintime',
		'gateout',
		'vehiclenumber',
		'vehicletype',
		'drivername',
		'drivermobilnumber',
		'activitytype',
		'noofboxes',
		'Paperchecked',
		'vehicleinspected',
		'assignedtodock',
		'docksupervisorname',
		'dockin',
		'dockout',
		'gateinremark',
		'gateoutremark',
		'actualboxes',
		'status',
		'createdby',
		'createdon',
		'updatedby',
		'updatedon'
	];

	public function userdatum()
	{
		return $this->belongsTo(Userdatum::class, 'docksupervisorname');
	}

	public function ym_warehouse()
	{
		return $this->belongsTo(YmWarehouse::class, 'idWarehouse');
	}
}
