<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Loader;
use App\Saver;
use App\FileNameCreator;


require_once 'vendor/autoload.php';

//1-й арг - урл
//2-й - команда
//3-й путь

$pageUrl = $argv[1] ?? '';
$command = $argv[2] ?? '';
$pathToSave = $argv[3] ?? '';

runPageLoader($pageUrl, $pathToSave, Client::class);


function runPageLoader(string $pageUrl, string $dirToSave, string $clientClass): bool
{

    if(!file_exists($dirToSave)){
        return false;
    }

    if(!$pageUrl){
        return false;
    }

    $pageContent = false;
    $httpClient = new $clientClass;
    $loader = new Loader($httpClient);
    $saver = new Saver();
    $convertor = new FileNameCreator();

    try {
        $pageContent = $loader->getPageContent($pageUrl);
    } catch (GuzzleException $e) {
        echo $e->getMessage();
    }

    if (!$pageContent) {
        return false;
    }

    $fileName = $dirToSave . $convertor->create($pageUrl);
    return $saver->savePage($pageContent, $fileName);

}
