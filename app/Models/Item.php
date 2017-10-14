<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Oct 2017 14:16:32 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Item
 * 
 * @property int $itemID
 * @property string $itemName
 * @property int $itemQuantity
 * @property float $itemPrice
 * @property string $itemDescription
 * @property bool $quality
 * @property int $status
 * @property bool $archive
 *
 * @package App\Models
 */
class Item extends Eloquent
{
	protected $primaryKey = 'itemID';
	public $timestamps = false;

	protected $casts = [
		'itemQuantity' => 'int',
		'itemPrice' => 'float',
		'quality' => 'bool',
		'status' => 'int',
		'archive' => 'bool'
	];

	protected $fillable = [
		'itemName',
		'itemQuantity',
		'itemPrice',
		'itemDescription',
		'quality',
		'status',
		'archive'
	];
}
