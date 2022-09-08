<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentMethod extends Enum
{
    const wallet =   0;
    const visa =   1;
    const freeMode =   2;
    const installment = 3;
}
