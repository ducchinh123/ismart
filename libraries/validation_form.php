<?php

// is_username

function is_username($label_field)
{

    //    $label_field = $_POST['']

    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";

    if (!preg_match($partten, $label_field))
        return false;
    return true;
}

// is_password

function is_password($label_field)
{

    //    $label_field = $_POST['']

    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($partten, $label_field))
        return false;

    return true;
}

function is_email($label_field)
{

    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";

    if (!preg_match($partten, $label_field)) {

        return false;
    }

    return true;
}


function is_phone($label_field)
{

    $partten = "/^0([0-9]+){9}$/";

    if (!preg_match($partten, $label_field)) {

        return false;
    }

    return true;
}

// is_email 

// form_error

function form_error($label_field)
{
    global $errors;
    if (!empty($errors[$label_field])) return "<p style='color: red'>{$errors[$label_field]}</p>";
}

// set_value

function set_value($label_field)
{
    //    $label_field = username

    global $$label_field;

    if (!empty($$label_field)) return $$label_field;
}
