<?php

namespace App\Enums;

class UserTypes
{
  const ADMIN = 'admin';

  const CUSTOMER = 'customer';
  const VENDOR = 'vendor';

  public static function getValues()
  {
    return [
      self::ADMIN,
      self::CUSTOMER,
      self::VENDOR,
    ];
  }
}
