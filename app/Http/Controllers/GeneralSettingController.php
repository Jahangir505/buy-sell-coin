<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Escrow;

use App\User;

use Twilio;

use App\Models\Otp;

use App\Models\Receive;

use App\Models\Transaction;

use App\Models\Currrency;

use App\Models\Country;

use App\Models\GeneralSetting;

use App\Models\CoinSettings;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use Jenssegers\Agent\Agent;

use Intervention\Image\Facades\Image;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class GeneralSettingController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function generalSetting()

    {  

        $data = [];

        $data['general_setting'] = GeneralSetting::first();

        return view('vendor.voyager.general_setting.gift_card_fee',$data);

    }

    public function saveGiftCardFee(Request $request)

    {  

        $id = isset($request->id) ? $request->id:'';

        $general_setting = new GeneralSetting();

        if($id && $id > 0)

        {

            $general_setting = GeneralSetting::find($id);

        }

        $general_setting->gift_card_fee = $request->gift_card_fee;

        $general_setting->support_email = isset($request->support_email) ? $request->support_email:'';

        $general_setting->save();

        // flash('Done Successfully', 'info');

        return back()->with(['message' => "Done Successfully", 'alert-type' => 'success']);

    }

    public function coins_settings()

    {

    	$data = [];

        $data['general_setting'] = GeneralSetting::first();

        $data['coins'] = CoinSettings::get();

        return view('vendor.voyager.general_setting.coins_settings',$data);

    }

    public function deletCoins($id)
    {
        $coin_settings = CoinSettings::find($id);
        $coin_settings->delete();

        return back();
    }

    public function saveCoinsSetting(Request $request)

    {
        
        

    	$detail = isset($request->detail) ? $request->detail:'';

    	if(!empty($detail))

    	{

    		foreach($detail as $key=>$row)

    		{

    			$coin_settings = new CoinSettings();

    			$id = isset($row['id']) ? $row['id']:'';

    			if($id)

    			{

    				$coin_settings = CoinSettings::find($id);

    			}

    			$coin_settings->user_id = auth()->user()->id;

                $coin_settings->coin_name = isset($row['coin_name']) ? $row['coin_name']:'';

    			$coin_settings->wallet_address = isset($row['wallet_address']) ? $row['wallet_address']:'';

    			$coin_settings->price = isset($row['price']) ? formateAmount($row['price']):'';

                $coin_settings->sell_price = isset($row['sell_price']) ? formateAmount($row['sell_price']):'';

                $qr = isset($request->qr_code[$id]) ?$request->qr_code[$id]:'';

                //var_dump($request->qr_code);exit;

                if($qr )

                {
                    $path = 'assets/qr_code';

                    $size = '800x800';

                    $qr = $this->uploadImage($qr, $path, $size);

                    $coin_settings->qr_code = $qr;
                }

    			if($coin_settings->coin_name)

    			{
    				$coin_settings->save();
    			}

    		}

    		return back()->with(['message' => "Done Successfully", 'alert-type' => 'success']);

    	}

    	return back()->with(['message' => "Please add data", 'alert-type' => 'danger']);

    }

    private function uploadImage($file, $location, $size = null, $old = null, $thumb = null)

    {

        $path = $this->makeDirectory($location);

        if (!$path) throw new Exception('File could not been created.');

        if ($old) {

            $this->removeFile($location . '/' . $old);

            $this->removeFile($location . '/thumb_' . $old);

        }

        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file);

        if ($size) {

            $size = explode('x', strtolower($size));

            $image->resize($size[0], $size[1]);

        }

        $image->save($location . '/' . $filename);

        if ($thumb) {

            $thumb = explode('x', $thumb);

            Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);

        }

        return $filename;

    }

    private function makeDirectory($path)

    {

        if (file_exists($path)) return true;

        return mkdir($path, 0755, true);

    }

    private function removeFile($path)

    {

        return file_exists($path) && is_file($path) ? @unlink($path) : false;

    }

    public function generateRandomString($length = 10) 

    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) 

        {

            $randomString .= $characters[rand(0, $charactersLength - 1)];

        }

        return $randomString;

    }

}

