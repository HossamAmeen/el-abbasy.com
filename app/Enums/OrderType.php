<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderType extends Enum
{
    const technical_support =  0;
    const contact =   1;
    const visit = 2;
    const complain = 4;
}
