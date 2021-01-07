<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Builder;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            return response()->json(["message" => 'Wrong email!'], 401);
        }
        if ($password == $user->password) {
            $signer = new Sha256();
            $token = (new Builder())->setIssuer('http://example.com') // Configures the issuer (iss claim)
                ->setAudience('http://example.org') // Configures the audience (aud claim)
                ->setId('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
                ->setIssuedAt(time()) // Configures the time that the token was issued (iat claim)
                ->setNotBefore(time()) // Configures the time that the token can be used (nbf claim)
                ->setExpiration(time() + 13600) // Configures the expiration time of the token (exp claim)
                ->set('uid', $user->id) // Configures a new claim, called "uid"
                ->sign($signer, 'testing') // creates a signature using "testing" as key
                ->getToken(); // Retrieves the generated token

            $token->getHeaders(); // Retrieves the token headers
            $token->getClaims(); // Retrieves the token claims

            return response()->json((string)$token, 201);
        } else return response()->json(["message" => 'Wrong password!'], 401);
    }
}
