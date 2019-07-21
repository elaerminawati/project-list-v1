<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);



// $app->singleton('Github\Client', function () {
//     $client = new Github\Client();
//     dd(Auth::id());
//     $gitdata = DB::table("project_lists")->where([['user_id', Auth::id()]]);
//         if($gitdata->get()->count() > 0 ){
//             $gitdataapi = $gitdata->first();
//             $token = Crypt::decryptString($gitdataapi->git_token);
    
//             if (!isset($token)) {
//             dd("Github token is not set.");
//             }
        
//             $client->authenticate($gitdataapi->git_email, Crypt::decryptString($gitdataapi->git_password), Github\Client::AUTH_HTTP_PASSWORD);
//             //$client->authenticate($token, null, Github\Client::AUTH_HTTP_TOKEN);
//         }else{
//             dd("DATA GIT NOT FOUND");
//         }
        
    
//         return $client;
// });
  

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
