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
}