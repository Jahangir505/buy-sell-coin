<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class SellCrypto extends Model
{
	protected $table =	'sell_coins';
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
