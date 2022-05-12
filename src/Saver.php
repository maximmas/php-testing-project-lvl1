<?php

namespace App;

class Saver
{

    public function savePage(string $content, string $fileName):bool
    {

        $handle = fopen($fileName, 'wb+');

        if (!$handle){
            return false;
        }
        $result = fwrite($handle, $content);
        fclose($handle);

        return $result;
    }

}