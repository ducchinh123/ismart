<?php

function has_child($data, $id)
{

    foreach ($data as $item) {

        if ($item['parent_id'] == $id) {

            return true;
        }
    }
    return false;
}


function data_tree($data, $parent_id = 0, $level = 0)
{

    $result = [];

    foreach ($data as $item) {

        if ($item['parent_id'] == $parent_id) {

            // lấy ra các ông bố
            $item['level'] = $level;
            $result[] = $item;
            // lấy ra các ông con

            if (has_child($data, $item['id'])) {

                $result_child = data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $result_child);
            }
        }
    }
    return $result;
}
