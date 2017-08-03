<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Utility
 * 
 * @property int $utilityID
 * @property string $barangayName
 * @property string $chairmanName
 * @property string $signaturePath
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
 *
 * @package App\Models\Base
 */
class Utility extends Eloquent
{
	protected $primaryKey = 'utilityID';
	public $timestamps = false;
}
