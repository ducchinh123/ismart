<?php

function construct()
{

    load_model('index');
}


function indexAction()
{

    $list_post = get_list_post();
    $data['list_post'] = $list_post;
    $total_public = totalPublic();
    $total_private = totalPrivate();
    $total_post = totalPost();
    $data['total_public'] = $total_public;
    $data['total_private'] = $total_private;
    $data['total_post'] = $total_post;
    load_view('list', $data);
}
