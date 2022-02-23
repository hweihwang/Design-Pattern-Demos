<?php

namespace Support;

class Helper
{
    public static function res($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        die;
    }
}