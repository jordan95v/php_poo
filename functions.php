<?php

function chance($percentage): bool
{
    return rand() % 100 < $percentage;
}

function percentToMultiplier($percentage): float
{
    return $percentage / 100 + 1;
}
