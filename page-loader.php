<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

require_once dirname(__DIR__) . '/vendor/autoload.php';

//1-й арг - урл
//2-й - команда
//3-й путь

$pageUrl = $argv[1] ?? '';
$command = $argv[2] ?? '';
$pathToSave = $argv[3] ?? '';

runPageLoader($pageUrl, $pathToSave, Client::class);


/**
 * @throws GuzzleException
 */
function runPageLoader(string $pageUrl, string $pathToSave, string $clientClass){

    $pageContent = false;
    $httpClient = new $clientClass;
    $loader = new PL\Loader($httpClient);
    $saver = new PL\Saver();

//    try {
//        $pageContent = $loader->getPageContent($pageUrl);
//    } catch (GuzzleException $e){
//        echo $e->getMessage();
//    }

    if(1 || $pageContent){

        $fileName = \PL\Helpers::createFileNameFromUrl($pageUrl);
        echo $fileName;

//        $saver->savePage($pageUrl, $pageContent, $pathToSave);
    }

}
