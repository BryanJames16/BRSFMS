<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 23:36:12 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Utility
 * 
 * @property int $utilityID
 * @property string $barangayName
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
 * @property string $signaturePath
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
		'yearsOfExpiration',
		'signaturePath'
	];
}
