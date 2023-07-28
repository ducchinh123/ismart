<?php

function user_login()
{

    if (!empty($_SESSION['username'])) {

        return $_SESSION['username'];
    }

    return FALSE;
}
