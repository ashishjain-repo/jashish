<?php

function render_json($path)
{
 $result = file_get_contents($path);
 $final = json_decode($result);
 return $final;
}

function get_contact_array_account($filename)
{
//    $contact_table = file_get_contents($filename);
//    $final_json = json_decode($contact_table);
    $final = [];
    for ($i = 0; $i < count($filename); $i++) {
        foreach ($filename[$i] as $key => $val) {
            if ($key == "account")
                array_push($final, $val);
        }
    }
    return $final;
}
function get_contact_array_username($filename)
{
//    $contact_table = file_get_contents($filename);
//    $final_json = json_decode($contact_table);
    $final = [];
    for ($i = 0; $i < count($filename); $i++) {
        foreach ($filename[$i] as $key => $val) {
            if ($key == "username")
                array_push($final, $val);
        }
    }
    return $final;
}

function get_contact_array_icon($filename)
{
//    $contact_table = file_get_contents($filename);
//    $final_json = json_decode($contact_table);
    $final = [];
    for ($i = 0; $i < count($filename); $i++) {
        foreach ($filename[$i] as $key => $val) {
            if ($key == "icon")
                array_push($final, $val);
        }
    }
    return $final;
}
function get_contact_array_link($filename)
{
//    $contact_table = file_get_contents($filename);
//    $final_json = json_decode($contact_table);
    $final = [];
    for ($i = 0; $i < count($filename); $i++) {
        foreach ($filename[$i] as $key => $val) {
            if ($key == "link")
                array_push($final, $val);
        }
    }
    return $final;
}
function get_contact_array_description($filename)
{
//    $contact_table = file_get_contents($filename);
//    $final_json = json_decode($contact_table);
    $final = [];
    for ($i = 0; $i < count($filename); $i++) {
        foreach ($filename[$i] as $key => $val) {
            if ($key == "description")
                array_push($final, $val);
        }
    }
    return $final;
}


?>