<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TransactionStatus extends Enum implements LocalizedEnum
{
    const pending =   0;
    const completed =   1;
    const reflected = 2;
    const failed = 3;
}
