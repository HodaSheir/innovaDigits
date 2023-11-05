<?php

namespace App\Enums;

class UserTypes
{
  const CUSTOMER = 'customer';
  const VENDOR = 'vendor';

  public static function getValues()
  {
    return [
      self::CUSTOMER,
      self::VENDOR,
    ];
  }
}
