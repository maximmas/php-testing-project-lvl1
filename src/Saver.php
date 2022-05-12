<?php

namespace App;

class Saver
{

    public function savePage(string $pageUrl, string $content, string $path){

        $handle = fopen("log.txt", "a+");
        $x = fwrite($handle, $content);
        fclose($handle);

    }

}