<?php


use app\Http\controllers\welcomeController;
use app\Http\controllers\postController;

use Illuminate\Support\Facades\Artisan;

function artisanCommand($command)
{
    try {
        Artisan::call($command);
        $output = Artisan::output();
        return $output;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//constants
define('GIFT_CARD_API_URL', 'https://giftcards.reloadly.com');

// session_start();

Artisan::call('storage:link');

Route::get('lang', 'langController@getLang')->name('getlang');
Route::get('lang/{lang}', 'langController@setLang')->name('setlang')->middleware('lang');

/*Route::get('/lang/{lang}', function ($locale){
	Session::put('locale', $locale);
       return redirect('/');
});*/

Route::match(["post","get"],'/probuyson', 'CoinsController@son');
Route::match(["post","get"],'/customer_paiement', 'HomeController@customer_paiement')->middleware('lang');
Route::get('/customer_paiement/delet/{id}', 'HomeController@customer_paiement_delet');


Route::get('/doc', function () {
    return view("doc.index");
})->middleware('lang');

Route::get('/docs', function () {
    return view("doc.doc");
})->middleware('lang');

Route::get('/support', function () {
    return view("support");
})->middleware('auth');

Route::get('/api/users', function () {
    return response()->json(\App\User::paginate(20));
});

Route::get('/about', function () {
    return view("about");
})->middleware('lang');;

Route::get('/confidentialite', function () {
    return view("confidentialite");
});
Route::get('/wallet/{id}','HomeController@wallet')->middleware('auth');    
 
Route::get('*', function(){
        App::setLocale(session()->get('locale'));
});
Route::get('/', "welcomeController@welcome")->middleware('lang');
Route::get('/mail', 'SignUpController@TestMail');
Route::get('/paysi', 'SignUpController@paysy');
Route::get('/account_status/{User}', 'HomeController@accountStatus')->middleware('auth');

//chat
Route::get('/chat', 'chatController@index');
Route::get('/token', 'chatController@token');

//Post Routes
Route::match(["post","get"],'/blogs/{key?}/{val?}/{page?}', "postController@display");
Route::get('/blog/{id}', "postController@single");

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('lang');
Route::post('login', 'Auth\LoginController@login');
Route::match(["post","get"],'logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'SignUpController@showRegistrationForm')->name('register');
Route::post('register', 'SignUpController@register');

/* WITHDRAWAL ROUTES */

route::get('/withdrawal/request/{method_id?}', 'WithdrawalController@getWithdrawalRequestForm')->name('withdrawal.form')->middleware(['auth','activeUser'])->middleware('lang');
route::post('/withdrawal/request', 'WithdrawalController@makeRequest')->name('post.withdrawal')->middleware('auth')->middleware('lang');
route::get('/withdrawals', 'WithdrawalController@index')->name('withdrawal.index')->middleware('auth')->middleware('lang');

Route::put('/confirm/withdrawal','WithdrawalController@confirmWithdrawal')->name('confirm.withdrawal')->middleware('auth');

/*	Currency ROUTES	*/
Route::get('/walletbalance', 'WalletbalanceController@index')->name('walletbalance')->middleware('auth');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'PassWordController@index')->name('password.email');
Route::post('password/confirm', 'PassWordController@valid')->name('password.confirm');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Account Activation Routes...
Route::get('register/{email}/{token}', 'SignUpController@verifyEmail');
Route::get('resend/activationlink', 'SignUpController@resendActivactionLink')->middleware('auth');
Route::get('otp', 'SignUpController@OTP')->middleware('auth');
Route::post('otp', 'SignUpController@postOtp')->middleware('auth');

//Impersonation routes
Route::get('impersonate/user/{user_id}', 'ProfileController@impersonateUser')->middleware('auth');
Route::impersonate();
Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();
    
    Route::get('phone-support', 'CoinsController@phone_support_view')->middleware('admin.user');
    Route::post('phone-support', 'CoinsController@phone_support_save')->middleware('admin.user');

    Route::get('online', 'CoinsController@online')->middleware('admin.user');
    Route::post('online', 'CoinsController@online_change')->middleware('admin.user');

    Route::get('mails', 'MailController@index')->name('admin.mail.index')->middleware('admin.user');
    Route::post('mails','MailController@send')->name('admin.mail.send')->middleware('admin.user');
    
    Route::get('kyc','KYCController@index')->name('admin.kyc.index')->middleware('admin.user');
    Route::get('kyc/view/{id}','KYCController@viewProfile')->name('admin.kyc.view')->middleware('admin.user');
    Route::post('kyc/view/{id}','KYCController@validateProfile')->name('admin.kyc.validate')->middleware('admin.user');
    Route::get('/generalSetting','GeneralSettingController@generalSetting')->name('admin.generalSetting')->middleware('admin.user');
    Route::post('/saveGiftCardFee','GeneralSettingController@saveGiftCardFee')->name('admin.saveGiftCardFee')->middleware('admin.user');

    //coins setting
    Route::get('/coins_settings','GeneralSettingController@coins_settings')->name('admin.coins_settings')->middleware('admin.user');
    Route::get('/delet_coins/{id}','GeneralSettingController@deletCoins')->name('admin.delet_coins')->middleware('admin.user');
    Route::post('/saveCoinsSetting','GeneralSettingController@saveCoinsSetting')->name('admin.saveCoinsSetting')->middleware('admin.user');

    //buy crypto route admin
    Route::get('/buy_pending_requests','CryptoController@buy_pending_requests')->name('admin.buy_pending_requests')->middleware('admin.user');
    Route::get('/buy_approved_requests','CryptoController@buy_approved_requests')->name('admin.buy_approved_requests')->middleware('admin.user');
    Route::get('/buy_reject_requests','CryptoController@buy_reject_requests')->name('admin.buy_reject_requests')->middleware('admin.user');
    Route::post('/update_buy_crypto_status/{id}','CryptoController@update_buy_crypto_status')->name('admin.update_buy_crypto_status')->middleware('admin.user');

    //Sell Crypto rotue admin
    Route::get('/sell_pending_requests','CryptoController@sell_pending_requests')->name('admin.sell_pending_requests')->middleware('admin.user');
    Route::get('/sell_approved_requests','CryptoController@sell_approved_requests')->name('admin.sell_approved_requests')->middleware('admin.user');
    Route::get('/sell_reject_requests','CryptoController@sell_reject_requests')->name('admin.sell_reject_requests')->middleware('admin.user');
    Route::post('/update_sell_crypto_status/{id}','CryptoController@update_sell_crypto_status')->name('admin.update_sell_crypto_status')->middleware('admin.user');

});

//PAYZOFT WALLET
route::get('buyvoucher/payzoftwallet', 'PayzoftWalletController@buyvoucher')->middleware('auth');
route::post('buyvoucher/payzoftwallet', 'PayzoftWalletController@payment')->middleware('auth');
Route::get('buyvoucher/payzoftwallet/payment/success/{ref}', 'PayzoftWalletController@buyvoucherIndexPaymentSuccess')->name('payzoftwalletbuyvoucherpaymentsuccess');
Route::get('/merchant/storefront/payzoftwallet/{ref}', 'PayzoftWalletController@storefrontIndex')->name('payzoftwalletstorefront');
Route::post('/merchant/storefront/payzoftwallet/payment/{ref}', 'PayzoftWalletController@storefrontIndexPayment')->name('payzoftwalletstorefrontpayment');
Route::get('/merchant/storefront/payzoftwallet/payment/success/{ref}', 'PayzoftWalletController@storefrontIndexPaymentSuccess')->name('payzoftwalletstorefrontpaymentsuccess');
//RAVE VOUCHER ROUTES

route::get('buyvoucher/rave', 'RaveController@buyvoucher')->middleware('auth');
route::post('pay/voucher/rave/success', 'RaveController@payVoucherRaveSuccess')->middleware('auth');
route::post('pay/voucher/rave/global_card','RaveController@payVoucherRaveGlobalCard')->middleware('auth');
route::post('/merchant/storefront/rave/success','RaveController@postStoreFrontSuccess');
//REQUEST MONEY ROUTES

Route::get('/requestmoney', 'MoneyTransferController@requestMoneyForm')->name('requestMoneyForm')->middleware('auth');
Route::post('/requestmoney', 'MoneyTransferController@requestMoney')->name('requestMoney')->middleware('auth');
// Route::post('/requestMoneyConfirm', 'MoneyTransferController@requestMoneyConfirm')->name('requestMoneyConfirm')->middleware('auth');
// Route::post('/requestMoneyDelete', 'MoneyTransferController@requestMoneyCancel')->name('requestMoneyDelete')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth')->middleware('lang');

//Coins Routes
Route::get('/buyCoin', 'CoinsController@buyCoin')->name('buyCoin')->middleware('auth')->middleware('lang');
Route::get('/sellCoin', 'CoinsController@sellCoin')->name('sellCoin')->middleware('auth')->middleware('lang');
Route::match(["post","get"],'/postBuyCrypto', 'CoinsController@postBuyCrypto')->name('postBuyCrypto')->middleware('auth');
Route::match(["post","get"],'/postSellCrypto', 'CoinsController@postSellCrypto')->name('postSellCrypto')->middleware('auth');

Route::match(["post","get"],'/postBuyCryptoConfirm', 'CoinsController@postBuyCryptoConfirm')->name('postBuyCryptoConfirm')->middleware('lang');
Route::match(["post","get"],'/postSellCryptoConfirm', 'CoinsController@postSellCryptoConfirm')->name('postSellCryptoConfirm')->middleware('lang');

//Affiliation
Route::get('/affiliation', 'CoinsController@affiliation')->name('buyCoin')->middleware('auth')->middleware('lang');

Route::get('/a/{id}', function ($id) {
    $_SESSION["parent_affiliation"]=$id;
    //session("parent_affiliation",$id);
    return redirect("/register");
});



//Gift Cards Route
Route::get('/giftCards', 'GiftCardController@gift_card')->name('cards')->middleware('auth');
Route::get('/getGiftCards/{code}/{country_id}', 'GiftCardController@getGiftCards')->name('getGiftCards')->middleware('auth');
Route::get('/getGiftCards/{code}/{country_id}/{product_id}', 'GiftCardController@getGiftCards')->name('getGiftCards')->middleware('auth');
Route::post('/order_gift_card', 'GiftCardController@order_gift_card')->name('order_gift_card')->middleware('auth');
/*	MERCHANT ROUTES	*/

Route::get('/merchant/storefront/{ref}', 'MerchantController@getStoreFront')->name('storefront');
Route::get('/merchant/{merchant}/docs', 'MerchantController@integration')->middleware('auth');
Route::get('/mymerchants', 'MerchantController@index')->name('mymerchants')->middleware('auth');
Route::get('/merchant/new', 'MerchantController@new')->name('merchant.new')->middleware('auth');
Route::post('/merchant/add','MerchantController@add')->name('merchant.add')->middleware('auth');
/*	IPN ROUTES	*/

Route::post('/purchase/link', 'RequestController@storeRequest')->name('purchase_link');
Route::post('/request/status', 'RequestController@requestStatus')->name('purchase_status');
Route::post('/purchase/confirm', 'IPNController@purchaseConfirmation')->name('purchaseConfirm')->middleware('auth');
Route::post('/purchase/delete', 'IPNController@purchaseCancelation')->name('purchaseDelete')->middleware('auth');
Route::post('/ipn/payment', 'IPNController@pay')->name('pay')->middleware('auth');
Route::post('/ipn/payment/guest', 'IPNController@logandpay')->name('logandpay');
/*	ADD CREDIT ROUTES	*/

Route::get('/addcredit/{method_id?}', 'AddCreditController@addCreditForm')->name('add.credit')->middleware(['auth','activeUser']);
Route::get('/deposit', 'AddCreditController@depositMethods')->name('deposit.credit')->middleware('auth');
Route::post('/addcredit', 'AddCreditController@depositRequest')->name('post.credit')->middleware('auth');
/*	DEPOSITS ROUTES	*/

Route::get('/mydeposits','DepositController@myDeposits')->name('mydeposits')->middleware('auth');
Route::put('/confirm/deposit','DepositController@confirmDeposit')->name('confirm.deposit')->middleware('auth');

/* WITHDRAWAL ROUTES */

route::get('/withdrawal/request/{method_id?}', 'WithdrawalController@getWithdrawalRequestForm')->name('withdrawal.form')->middleware(['auth','activeUser']);
route::post('/withdrawal/request', 'WithdrawalController@makeRequest')->name('post.withdrawal')->middleware('auth');
route::get('/withdrawals', 'WithdrawalController@index')->name('withdrawal.index')->middleware('auth');
Route::match(["post","put"],'/confirm/withdrawal','WithdrawalController@confirmWithdrawal')->name('confirm.withdrawal')->middleware('auth');

/* EXCHANGE ROUTES */

route::get('/exchange/first/{first_id?}/second/{second_id?}', 'ExchangeController@getExchangeRequestForm')->name('exchange.form')->middleware('auth');
route::post('/exchange/', 'ExchangeController@exchange')->name('post.exchange')->middleware('auth');
route::post('/update_rates','ExchangeController@updateRate')->middleware('auth');
route::get('/update_rates','ExchangeController@updateRateForm')->middleware('auth');
route::get('new_ticket', 'TicketsController@create')->name('support');
route::post('new_ticket', 'TicketsController@store')->name('support');
route::get('my_tickets', 'TicketsController@userTickets')->name('support');
Route::get('tickets/{ticket_id}', 'TicketsController@show')->name('support');
Route::post('comment', 'TicketCommentsController@postTicketComment')->name('support');
Route::group(['prefix' => 'ticketadmin', 'middleware' => 'ticketadmin'], function() {
    Route::get('tickets', 'TicketsController@index')->name('support');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close')->name('support');
});
route::get('profile/info', 'ProfileController@personalInfo')->name('profile.info')->middleware('auth')->middleware('lang');
route::post('profile/info', 'ProfileController@storePersonalInfo')->name('profile.info.store')->middleware('auth')->middleware('lang');
route::get('profile/identity', 'ProfileController@profileIdentity')->name('profile.identity')->middleware('auth')->middleware('lang');
route::post('profile/identity', 'ProfileController@storeProfileIdentity')->name('profile.identity.store')->middleware('auth')->middleware('lang');
route::get('profile/newpassword', 'ProfileController@newpasswordInfo')->name('profile.newpassword')->middleware('auth')->middleware('lang');
route::post('profile/newpassword', 'ProfileController@storeNewpasswordInfo')->name('profile.newpassword.store')->middleware('auth')->middleware('lang');
route::get('profile/delete', 'ProfileController@deleteInfo')->name('profile.delete')->middleware('auth')->middleware('lang');
route::post('profile/delete', 'ProfileController@deleteVerif')->name('profile.deleteVerif')->middleware('auth')->middleware('lang');

//PAGES ROUTES
route::get('page/{id}', "HomeController@getPage");

//VOUCHERS ROUTES
route::get('my_vouchers', 'VoucherController@getVouchers')->name('my_vouchers')->middleware('auth');
route::post('my_vouchers', 'VoucherController@createVoucher')->name('create_my_voucher')->middleware('auth');
route::post('load_my_voucher', 'VoucherController@loadVoucher')->name('load_my_voucher')->middleware('auth');
route::post('load_voucher_to_user', 'VoucherController@loadVoucherToUser')->name('load_voucher_to_user')->middleware('auth');
route::get('makevouchers', 'VoucherController@generateVoucher')->name('makeVouchers')->middleware('auth');
route::post('generateVoucher', 'VoucherController@postGenerateVoucher')->name('generateVoucher')->middleware('auth');
route::get('buyvoucher', 'VoucherController@buyvouchermethod')->middleware('auth');

//PAYPAL VOUCHER ROUTES
route::get('buyvoucher/paypal', 'PayPalController@buyvoucher')->middleware('auth');
route::post('buyvoucher/paypal', 'PayPalController@sendRequestToPaypal')->middleware('auth');
route::get('pay/voucher/paypal/success', 'PayPalController@paySuccess')->middleware('auth');
Route::post('/merchant/storefront/paypal/{ref}', 'PayPalController@postStoreFront')->name('paypalstorefront');
Route::get('/merchant/storefront/paypal/success', 'PayPalController@postStoreFrontSuccess');
Route::get('/merchant/storefront/paypal/cancel', 'PayPalController@postStoreFrontCancel');

//PAYSTACK VOUCHER ROUTES
route::get('buyvoucher/paystack', 'PaystackController@buyvoucher')->middleware('auth');
route::post('buyvoucher/paystack', 'PaystackController@sendRequestToPayStack')->middleware('auth');
route::get('pay/voucher/paystack/success', 'PaystackController@payVoucherPayStackSuccess')->middleware('auth');
Route::post('/merchant/storefront/paystack/{ref}', 'PaystackController@postStoreFront')->name('paystackstorefront');
Route::get('/merchant/storefront/paystack/success', 'PaystackController@postStoreFrontSuccess');

//STRIPE VOUCHER ROUTES
route::get('buyvoucher/stripe', 'StripeController@buyvoucher')->middleware('auth');
route::post('buyvoucher/stripe', 'StripeController@sendRequestToStripe')->middleware('auth');
Route::get('/merchant/storefront/card/{ref}', 'StripeController@storefrontIndex')->name('stripestorefront');
Route::post('/merchant/storefront/card/payment/{ref}', 'StripeController@storefrontIndexPayment')->name('stripestorefrontpayment');
//route::get('pay/voucher/paystack/success', 'PaystackController@payVoucherPayStackSuccess')->middleware('auth');

//2CHECKOUT VOUCHER ROUTES
route::get('buyvoucher/2checkout', 'TwoCheckoutController@buyvoucher')->middleware('auth');
route::post('buyvoucher/2checkout', 'TwoCheckoutController@sendRequestToStripe')->middleware('auth');
//route::get('pay/voucher/paystack/success', 'PaystackController@payVoucherPayStackSuccess')->middleware('auth');

//TUTORIAL ROUTES
//route::get('blog', 'BlogController@index' )->name('blog');
//route::get('blog/{post_excerpt}/{post_id}', 'BlogController@singlePost' )->name('post');

//TRANSACTIOINS ROUTES
route::post('transaction/remove', 'TransactionController@deleteMapper')->middleware('auth');

//ADMINISTRATION ROUTES
route::get('users/all', 'ProfileController@getUsers')->middleware('auth');

//DEMO ROUTES
route::get('demo/index', 'DemoController@index')->middleware('guest');
route::get('demo/user', 'DemoController@user')->name('demouser')->middleware('guest');
route::get('demo/admin', 'DemoController@admin')->name('demoadmin')->middleware('guest');
route::get('/me/{user_name}', 'ProfileController@me');

// Airitime
route::get('/airtime', 'AirtimeController@airtime')->name('airtime')->middleware('auth');
route::post('/buyAirtimeRequest', 'AirtimeController@buyAirtimeRequest')->name('buyAirtimeRequest');
route::get('/getOperatores/{country_code}/{currency_code}', 'AirtimeController@getOperatores')->name('getOperatores');

//affiliation