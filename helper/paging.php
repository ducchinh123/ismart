<?php

function get_data($select, $start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {

        $where = "WHERE {$where}";
    }

    $listData = db_fetch_array("{$select} {$where} LIMIT {$start}, {$num_per_page}");
    return $listData;
}

// thanh phân trang tùy biến

function get_pagging($num_page, $base_url, $page)
{

    $previous = $page - 1;
    $next = $page + 1;
    $string_pagging = '<ul class="list-item clearfix">';
    $next_two_pages = $page + 2;

    if ($page > 1) {

        $string_pagging .= "<li><a href='{$base_url}&page={$previous}' title='' style='font-size: 20px;'>
        &#9668; </a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {

        if ($i == $page) {

            $active = "active";
        } else {
            $active = "no_active";
        }


        if ($i > 3 && $i = $num_page) {

            $string_pagging .= "<li><a href='{$base_url}&page={$next_two_pages}' title='Next 2 pages' class=''>...</a></li>";
        }


        $string_pagging .= "<li style='padding: 3px;'><a href='{$base_url}&page={$i}' style='padding: 5px 15px; border-radius: 30px; ;background-color: #4FA327; font-size: 14px; color: white;' class='{$active}'>{$i}</a></li>";
    }

    if ($page <  $num_page) {

        $string_pagging .= "<li><a href='{$base_url}&page={$next}' title='' style='font-size: 23px;'>
        &#9658; </a></li>";
    }

    $string_pagging .= "</ul>";

    return $string_pagging;
}
