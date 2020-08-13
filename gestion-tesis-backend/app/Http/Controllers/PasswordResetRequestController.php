<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function sendPasswordResetEmail(Request $request){
        // If email does not exist
        if(!$this->validEmail($request->Correo)) {
            return response()->json([
                'message' => 'Email does not exist.'
            ], Response::HTTP_NOT_FOUND);
        } else {
            // If email exists
            $this->sendMail($request->Correo);
            return response()->json([
                'message' => 'Check your inbox, we have sent a link to reset email.'
            ], Response::HTTP_OK);
        }
    }


    public function sendMail($Correo){
        $token = $this->generateToken($Correo);
        Mail::to($Correo)->send(new SendMail($token));
    }

    public function validEmail($Correo) {
       return !!User::where('Correo', $Correo)->first();
    }

    public function generateToken($Correo){
      $isOtherToken = DB::table('recover_password')->where('Correo', $Correo)->first();

      if($isOtherToken) {
        return $isOtherToken->token;
      }

      $token = Str::random(80);
      $this->storeToken($token, $Correo);
      return $token;
    }

    public function storeToken($token, $Correo){
        DB::table('recover_password')->insert([
            'Correo' => $Correo,
            'token' => $token,
            'created' => Carbon::now()
        ]);
    }
}
