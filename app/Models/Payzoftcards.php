<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Payzoftcards extends Model
{
	protected $fillable = ['user_id','rave_id','cardpan','maskedpan','expiration','type','is_active'];
    
    public function Transactions()
    {
        return $this->morphMany('App\Models\Transaction', 'Transactionable');
    }
}