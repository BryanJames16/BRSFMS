<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Oct 2017 00:48:55 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Utility
 * 
 * @property int $utilityID
 * @property string $barangayName
 * @property string $chairmanName
 * @property string $address
 * @property string $brgyLogoPath
 * @property string $provLogoPath
 * @property string $facilityPK
 * @property string $documentPK
 * @property string $servicePK
 * @property string $residentPK
 * @property string $familyPK
 * @property string $docRequestPK
 * @property string $docApprovalPK
 * @property string $reservationPK
 * @property string $serviceRegPK
 * @property string $sponsorPK
 * @property string $collectionPK
 * @property float $barangayIDAmount
 * @property int $expirationID
 * @property int $yearsOfExpiration
 *
 * @package App\Models
 */
class Utility extends Eloquent
{
	protected $primaryKey = 'utilityID';
	public $timestamps = false;

	protected $casts = [
		'barangayIDAmount' => 'float',
		'expirationID' => 'int',
		'yearsOfExpiration' => 'int'
	];

	protected $fillable = [
		'barangayName',
		'chairmanName',
		'address',
		'brgyLogoPath',
		'provLogoPath',
		'facilityPK',
		'documentPK',
		'servicePK',
		'residentPK',
		'familyPK',
		'docRequestPK',
		'docApprovalPK',
		'reservationPK',
		'serviceRegPK',
		'sponsorPK',
		'collectionPK',
		'barangayIDAmount',
		'expirationID',
		'yearsOfExpiration'
	];
}
