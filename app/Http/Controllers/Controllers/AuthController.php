<?php

namespace App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7;





class AuthController extends Controller
{
    public function loginApi(Request $request)
    {
        // $credentials = Http::post('http://localhost:7000/api/v1/auth/login', [
        //         'email' => $request->email,
        //         'password' => $request->password,
        // ]);

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://127.0.0.1:7000',
            // You can set any number of default request options.
            'headers' => [
                'Content-Type' => 'application/json'],

        ]);

        try {
            
            $response = $client->request('POST', '/api/v1/auth/login', ['json' => ['email' => $request->email, 'password' => $request->password]]);
            $code = $response->getStatusCode();
            //echo $code;
            $body = json_decode($response->getBody());
            //echo $body->access_token;
            return response()->json(['message'=>'Exito','Api Data'=>$body],200)->cookie('name', $body->access_token);




        } 
        
        
        catch (ClientException $e) {
            
            echo Psr7\Message::toString($e->getRequest());
            echo Psr7\Message::toString($e->getResponse());
            
        }

    }

        

        
        public function registerapi(Request $request)
        {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://127.0.0.1:8000',
                // You can set any number of default request options.
                'headers' => [
                    'Content-Type' => 'application/json'],
    
            ]);
    
            try {
                
                $response = $client->request('POST', '/api/v1/auth/register', ['json' => ['name'=>$request->name,'email' => $request->email, 'password' => $request->password]]);
                $code = $response->getStatusCode();
                //echo $code;
                $body = json_decode($response->getBody());
                //echo $body->access_token;
                return response()->json(['message'=>'Exito','Api Data'=>$body],200);
    
    
    
    
            } 
            
            
            catch (ClientException $e) {
                
                echo Psr7\Message::toString($e->getRequest());
                echo Psr7\Message::toString($e->getResponse());
                
            }
        }
        
        
        //return redirect('dashboard');

    //     $client = new Client(['base_url'=>'http://localhost:3333','timeout' => 10.0,
    //     'verify' => false]);
    // try {


    //     $response = $client->request('POST', 'http://localhost:3333/register', [
    //         'json'=> ['username'=>$request->username,'password'=>$request->password]
    //     ]);

    //     $datos = json_decode($response->getBody());

    //     return response()->json(['message'=>'Exito','adonis_response'=>$datos],200);
    // }    
}   

