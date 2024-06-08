<?php

namespace CarMaster\Entity\Enum;

enum ConditionStatus : string
{
    case New = 'New';

    case Used = 'Used';

    case Restored = 'Restored';

    case Damaged = 'Damaged';
}