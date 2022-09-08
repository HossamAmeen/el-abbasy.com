<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ImagesStatus extends Enum
{
    const before =   0;
    const after  =   1;
    const during =   2;
}
