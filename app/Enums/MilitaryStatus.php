<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MilitaryStatus extends Enum
{
    const exemption =   0;
    const delayed =   1;
    const complete = 2;
    const not_his_turn = 3;
}
