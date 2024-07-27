<?php

namespace App\Enums;

/**
 * Class OrderPayStatus
 *
 * @method static string all()
 * @method static string|null nameFor($value)
 * @method static array toArray()
 * @method static array forApi()
 * @method static string slug(int $value)
 */
class OrderPayStatus extends Base
{
    public const PENDING     = 0;
    public const DOWNPAYMENT = 1;
    public const DONE        = 2;
    public const RETURNED    = 3;
}
