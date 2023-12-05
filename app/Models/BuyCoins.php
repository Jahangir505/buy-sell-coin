<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class BuyCoins extends Model
{
	protected $table =	'buy_coins';
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
