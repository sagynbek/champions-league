<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
  /**
   * Register the application's response macros.
   *
   * @return void
   */
  public function boot()
  {

    Response::macro('success', function ($data, $message = null, $status = 200) {
      $result = [
        'message' => [
          'status'  =>  true,
          'text' =>  $message,
        ],
        'data'     =>  $data,
      ];
      return Response::json($result, $status);
    });

    Response::macro('error', function ($message, $status = 400) {
      $result = [
        'message' => [
          'status'  =>  false,
          'text' =>  $message,
        ],
        'data'     =>  [],
      ];
      return Response::json($result, $status);
    });
  }
}
