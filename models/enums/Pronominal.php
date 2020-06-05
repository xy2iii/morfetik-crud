<?php

namespace app\models\enums;

use yii2mod\enum\helpers\BaseEnum;

/**
 * What's the pronominal status of the verb.
 * - YES: the verb is "pronominal", eg. "s'envoler",
 * - BOTH: the verb can be used in both forms, "pronominal" or not, eg. "apercevoir, s'apercevoir"
 * - NO: the verb is not "pronominal", eg. "manger".
 */
class Pronominal extends BaseEnum
{
    const NO = 0;
    const YES = 1;
    const BOTH = 2;
    const MAYBE = 3;

    /**
     * @var array
     */
    public static $list = [
        self::NO => 'Non',
        self::YES => 'Oui',
        self::BOTH => 'Oui + non',
        self::MAYBE => 'Peut-être?',
    ];
}
