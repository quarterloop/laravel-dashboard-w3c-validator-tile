<?php

namespace Quarterloop\w3cValidatorTile\Services;

use Illuminate\Support\Facades\Http;

class w3cValidatorAPI
{
  public static function getW3cValidator(string $url): array
  {
      $apiCall = "https://validator.w3.org/nu/?doc=http://{$url}&out=json";

      $response = Http::get($apiCall)->json();

      return $response;
  }
}
