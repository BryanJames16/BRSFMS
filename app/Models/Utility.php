<?php

namespace App\Models;

class Utility extends \App\Models\Base\Utility
{
	protected $fillable = [
		'barangayName',
		'chairmanName',
		'signaturePath',
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
		'sponsorPK'
	];
}
