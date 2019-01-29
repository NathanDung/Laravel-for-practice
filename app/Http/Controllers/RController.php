<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\facades\Input;

use Illuminate\Support\Facades\Hash;

use Register;

class RController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # /js-login.php
        $fb = new \Facebook\Facebook([
          'app_id' => '279976319334641',
          'app_secret' => '2315ad1e4f227db193b957ff69fce8fa',
          'default_graph_version' => 'v3.2',
          ]);

        $helper = $fb->getJavaScriptHelper();

        try {
          $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        if (! isset($accessToken)) {
          echo 'No cookie set or no OAuth data could be obtained from cookie.';
          exit;
        }

        // Logged in
        echo '<h3>Access Token</h3>';
        var_dump($accessToken->getValue());

        $_SESSION['fb_access_token'] = (string) $accessToken;

        // User is logged in!
        // You can redirect them to a members-only page.
        //header('Location: https://example.com/members.php');
    }

    public function personalinfo()
    {
        $fb = new \Facebook\Facebook([
            'app_id' => '279976319334641',
            'app_secret' => '2315ad1e4f227db193b957ff69fce8fa',
            'default_graph_version' => 'v3.2',
        ]);

        try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get('/me?fields=id,name,email,picture', 'EAADZBoxEPOPEBAFT9XUOZAmxsxLIYRt6HcvsaXZCMHjaHL80ZAOCNmOwlquZCGqSKZCcYcpUzuqTtPjKZCfsdN2RXaKuukOvh1zeywcPSM7J0hyynQc9XkrgvLa0Bbqq1ABIhSWbsfyBYSU4HZAxpW8Yw8VSCkbPOxL28UnYhXzblkZAikp4wDDUqGSGbmFjcTa3n5ZBAlJPTcZC1u8A2JfOovy');
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
        $user = $response->getGraphUser();
        echo 'Name: ' . $user['name']."<br>";

        $graphNode = $response->getGraphNode();
        $datas = $graphNode['picture'];
        echo 'Email: ' . $graphNode['email']."<br>";
        echo 'Picture: ' . $graphNode['picture']."<br>";
        foreach($datas as $data){
            var_dump($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $request['password'] = Hash::make('password');

        $register = new Register();
        $register->name = $request['name'];
        $register->email = $request['email'];
        $register->password = $request['[password'];
        $register->save();    

        echo "OK!";

        // $this->test = array();
        // foreach($request->all() as $one) {
        //     $this->test[] = $one;
        // }
        
        // print_r($this->test);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function test()
    {

    /**
    *    Credit信用卡付款產生訂單範例
    */
    
    //載入SDK(路徑可依系統規劃自行調整)
    include('ECPay.Payment.Integration.php');
    try {
        
        $obj = new ECPay_AllInOne();
   
        //服務參數
        $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
        $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
        $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密
        //基本參數(請依系統規劃自行調整)
        $MerchantTradeNo = "Test".time() ;
        $obj->Send['ReturnURL']         = "https://85defe88.ngrok.io/api/accept" ;    //付款完成通知回傳的網址
        $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
        $obj->Send['TotalAmount']       = 2000;                                      //交易金額
        $obj->Send['TradeDesc']         = "good to drink" ;                          //交易描述
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::Credit ;              //付款方式:Credit
        $obj->Send['IgnorePayment']     = ECPay_PaymentMethod::GooglePay ;           //不使用付款方式:GooglePay
        //訂單的商品資料
        array_push($obj->Send['Items'], array('Name' => "歐付寶黑芝麻豆漿", 'Price' => (int)"2000",
                   'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
        //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
        //以下參數不可以跟信用卡定期定額參數一起設定
        $obj->SendExtend['CreditInstallment'] = '' ;    //分期期數，預設0(不分期)，信用卡分期可用參數為:3,6,12,18,24
        $obj->SendExtend['InstallmentAmount'] = 0 ;    //使用刷卡分期的付款金額，預設0(不分期)
        $obj->SendExtend['Redeem'] = false ;           //是否使用紅利折抵，預設false
        $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;
        //Credit信用卡定期定額付款延伸參數(可依系統需求選擇是否代入)
        //以下參數不可以跟信用卡分期付款參數一起設定
        // $obj->SendExtend['PeriodAmount'] = '' ;    //每次授權金額，預設空字串
        // $obj->SendExtend['PeriodType']   = '' ;    //週期種類，預設空字串
        // $obj->SendExtend['Frequency']    = '' ;    //執行頻率，預設空字串
        // $obj->SendExtend['ExecTimes']    = '' ;    //執行次數，預設空字串
        
        # 電子發票參數
        /*
        $obj->Send['InvoiceMark'] = ECPay_InvoiceState::Yes;
        $obj->SendExtend['RelateNumber'] = "Test".time();
        $obj->SendExtend['CustomerEmail'] = 'test@ecpay.com.tw';
        $obj->SendExtend['CustomerPhone'] = '0911222333';
        $obj->SendExtend['TaxType'] = ECPay_TaxType::Dutiable;
        $obj->SendExtend['CustomerAddr'] = '台北市南港區三重路19-2號5樓D棟';
        $obj->SendExtend['InvoiceItems'] = array();
        // 將商品加入電子發票商品列表陣列
        foreach ($obj->Send['Items'] as $info)
        {
            array_push($obj->SendExtend['InvoiceItems'],array('Name' => $info['Name'],'Count' =>
                $info['Quantity'],'Word' => '個','Price' => $info['Price'],'TaxType' => ECPay_TaxType::Dutiable));
        }
        $obj->SendExtend['InvoiceRemark'] = '測試發票備註';
        $obj->SendExtend['DelayDay'] = '0';
        $obj->SendExtend['InvType'] = ECPay_InvType::General;
        */
        //產生訂單(auto submit至ECPay)
        $obj->CheckOut();
    
    } catch (Exception $e) {
        echo $e->getMessage();
        } 
    }

    public function accept(Request $request)
    {   
        dd($request);
    }
}