<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;

use Auth;

use App\Models\Escrow;

use App\User;

use Twilio;

use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;


use App\Models\Otp;

use App\Models\Receive;

use App\Models\CoinSettings;

use App\Models\BuyCoins;

use App\Models\SellCrypto;

use App\Models\Transaction;

use App\Models\Currrency;

use App\Models\Country;

use App\Models\DepositMethod;


use App\Models\GeneralSetting;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use Jenssegers\Agent\Agent;

use Mail;

use App\Mail\GiftCardEmail;

use Intervention\Image\Facades\Image;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Transactions;






class chatController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        

    }

    public function index()

    {

        return view("chat");

    }

    public function token()

    {

        

// Required for all Twilio access tokens
// To set up environmental variables, see http://twil.io/secure
$twilioAccountSid = "AC7b53454efe626306ac0ddd4a96604506";
$twilioApiKey = 'ff44890214769a7edadcec912184fa12';
$twilioApiSecret = getenv('TWILIO_API_KEY_SECRET');

// Required for Chat grant
$serviceSid = 'ISxxxxxxxxxxxx';
// choose a random username for the connecting user
$identity = "john_doe";

// Create access token, which we will serialize and send to the client
$token = new AccessToken(
    $twilioAccountSid,
    $twilioApiKey,
    $twilioApiSecret,
    3600,
    $identity
);

// Create Chat grant
$chatGrant = new ChatGrant();
$chatGrant->setServiceSid($serviceSid);

// Add grant to token
$token->addGrant($chatGrant);

// render token to string
echo $token->toJWT();

        /*$accountSid = "AC7b53454efe626306ac0ddd4a96604506";
        $authToken = 'ff44890214769a7edadcec912184fa12';

        $client = new Twilio\Rest\Client($accountSid, $authToken);
        $flexFlowSid = env('TWILIO_TWIML_APP_SID');

        $token = $client->taskrouter
            ->workspaces('WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX')
            ->workers('WKXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX')
            ;

        return response()->json([
            'accountSid' => $accountSid,
            'flexFlowSid' => $flexFlowSid,
            'token' => $token,
        ]);*/
    }

  }
