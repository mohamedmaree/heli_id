<?php

namespace App\Enums;

/**
 * Class OrderPayType
 *
 * @method static string all()
 * @method static string|null nameFor($value)
 * @method static array toArray()
 * @method static array forApi()
 * @method static string slug(int $value)
 */
class OrderPayType extends Base
{
    public const UNDEFINED = 0;
    public const CASH      = 1;
    public const WALLET    = 2;
    public const BANK      = 3;
    public const ONLINE    = 4;
}
