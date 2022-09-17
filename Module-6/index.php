<?php

error_reporting(E_ALL);

$textStorage = Array();

function debug($val) :void
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
}

function add(string $title, string $text, array &$arr) :void
{
    $arr[] = Array('title' => $title, 'text' => $text);
}

function remove(int $text_index, array &$arr) :bool
{
    if(array_key_exists($text_index, $arr)){
        unset($arr[$text_index]);
        return true;
    }
    return false;
}   

function edit(int $text_index, string $title = null, string $text = null, array &$arr) :bool
{
    if(!$title && !$text){
        echo '<script type="text/javascript">alert("Вы не внесли изменений!")</script>';
        return true;
    } else {
        if(array_key_exists($text_index, $arr)){
            $title ? $arr[$text_index]['title'] = $title : false;
            $text ? $arr[$text_index]['text'] = $text : false;
            return true;
        }
        return false;
    }
    
}

add('title_1', 'text_1', $textStorage);
add('title_2', 'text_2', $textStorage);
echo "Проверка добавления \r\n";
debug($textStorage);

echo 'Проверка удаления <br>';
var_dump(remove(0, $textStorage)); 
var_dump(remove(5, $textStorage)); 

echo '<p>Проверка редактирования <br>';
edit(1, 'new_title', null, $textStorage);
var_dump(edit(5, 'title_5', 'text_5', $textStorage));

debug($textStorage);
