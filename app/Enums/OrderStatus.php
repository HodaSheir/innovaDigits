<?php

namespace App\Enums;

class OrderStatus
{
  const PENDING = 'pending';
  const PROCESSING = 'processing';
  const SHIPPED = 'shipped';
  const CANCELED = 'canceled';
  const DELIVERED = 'delivered';
  public static function getValues()
  {
    return [
      self::PENDING,
      self::PROCESSING,
      self::SHIPPED,
      self::CANCELED,
      self::DELIVERED,
    ];
  }
}
