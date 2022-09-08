<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ContractCategory extends Enum
{
    const finishes  =   0;
    const Construction =   1;
    const industry_furniture =   2;
}
