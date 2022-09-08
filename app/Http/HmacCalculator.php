<?php

namespace App\Http;

class HmacCalculator
{
    public function calculate($parameters){
      $new_hash = $this->flatten($parameters);
      ksort($new_hash);
      $concate_array = $this->prepare_prams($new_hash);
      $concatenated_params = join('',array_values($concate_array));
      $hmac = hash_hmac('SHA512', $concatenated_params, env('HMAC_KEY'));
      return $hmac;
    }

    public function flatten($parameters){
      $new_hash = [];
      foreach ($parameters as $key => $value) {
        if (is_object($value)){
          foreach($value as $k => $val){
            $new_hash["{$key}.{$k}"] = $val;
          }
        }else
        {
          $new_hash["{$key}"] = $value;
        }
      }
      return $new_hash;
    }

    public function prepare_prams($new_hash){
      $concate_array = array_values($new_hash);
      for($i = 0; $i < count($concate_array); $i++){
          if (is_bool($concate_array[$i])){
              $concate_array[$i] = $concate_array[$i] ? "true" : "false";
          }
      }
      return $concate_array;
    }
}
