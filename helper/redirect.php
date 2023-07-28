<?php

function redirect_to($url = "")
{
    if (!empty($url)) {

        return header("Location: {$url}");
    } else {

        return header("Location: ?");
    }
}
