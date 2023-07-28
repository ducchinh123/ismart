<?php

function currency($number, $separation = ".")
{

    if (!empty($number)) {

        return number_format($number) . " đ";
    }
    return false;
}
