<?php

namespace App\Http\Middleware;

// use Lcobucci\JWT\Configuration;
// use Lcobucci\JWT\Token\Plain;
// use Lcobucci\JWT\Signer\Key\InMemory;
// use Lcobucci\JWT\Validation\Constraint\IdentifiedBy;
// use Lcobucci\JWT\Validation\Constraint\IssuedBy;
// use Lcobucci\JWT\Validation\Constraint\PermittedFor;
// use Lcobucci\JWT\Validation\Constraint\ValidAt;
// use DateTimeImmutable;
use Closure;
// use Lcobucci\JWT\Token;
// use Lcobucci\JWT\Validation\Constraint;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;
class AuthKey
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$clock = new DateTimeImmutable();
        //$constraint = new Constraint();
       // $config = Configuration::forSymmetricSigner(new Sha256(), InMemory::plainText('testing'));
    //     $config = Configuration::forUnsecuredSigner();
    //     $token = $config->parser()->parse($request->header('Authorization'));
    //    // $token = $config->parser()->parse('eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn0.eyJpc3MiOiJodHRwOlwvXC9hcGkuYWJjLmNvbSIsImF1ZCI6Imh0dHA6XC9cL2NsaWVudC5hYmMuY29tIiwianRpIjoiNGYxZzIzYTEyYWEiLCJ1aWQiOjF9.');
    //     //assert($token instanceof Plain);
    //     //dd($token);
    //     $constraints = [
    //         new IdentifiedBy('4f1g23a12aa'),
    //         new PermittedFor('http://client.abc.com'),
    //         new IssuedBy('http://issuer.abc.com', 'http://api.abc.com')
    //     ];
        //$config->setValidationConstraints($constraints);
       // $constraints = $config->validationConstraints();
        //dd($constraints, $token);
        $signer = new Sha256();
        $token = (new Parser())->parse($request->header('Authorization')); // Parses from a string
        // dd($token);
        
        $data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
        $data->setIssuer('http://example.com');
        $data->setAudience('http://example.org');
        $data->setId('4f1g23a12aa');
        $data->setCurrentTime(time()+ 60);
       // dd($token->validate($data));
        //echo(time());
       //dd($token, $data);
        if (!$token->validate($data)) {
            return response()->json(['message' => 'App data not found, wrong token'], 401);
        }
        if (!$token->verify($signer, 'testing')) {
            return response()->json(['message' => 'Unauthorized sign'], 401);
        }
       // if (!var_dump($token->validate($data))) { }
        return $next($request);
    }
 }
