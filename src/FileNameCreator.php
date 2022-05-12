<?php

namespace App;

class FileNameCreator
{

    public function create(string $url = ''): string|false
    {
        if(!$url){
            return false;
        }

        return $this->convertDomain($url) . $this->convertPath($url) . '.html';

    }


    public function convertDomain(string $url): string
    {
        $domain =  parse_url($url, PHP_URL_HOST);
        return str_replace('.', '-', $domain);
    }


    public function convertPath(string $url): string
    {
        $path =  parse_url($url,  PHP_URL_PATH);
        $path = preg_replace('/(\.\w+)/i',"", $path); // remove extension
        $path = str_replace('/', '-', $path);
        return rtrim($path,'-');
    }
}