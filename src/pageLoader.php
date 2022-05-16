<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Loader;
use App\Saver;
use App\FileNameCreator;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$pageUrl = $argv[1] ?? '';
$pathToSave = $argv[2] ?? dirname(__DIR__) . '/pages';

pageLoader($pageUrl, $pathToSave, Client::class);

function pageLoader(string $pageUrl, string $dirToSave, string $clientClass): bool
{

    if(!file_exists($dirToSave))
    {
        return false;
    }

    if(!$pageUrl)
    {
        return false;
    }

    if(!class_exists($clientClass)){
        return false;
    }

    $pageContent = false;
    $saver = new Saver();
    $convertor = new FileNameCreator();

    $httpClient = new $clientClass;
    $loader = new Loader($httpClient);

    try {
        $pageContent = $loader->getPageContent($pageUrl);
    } catch (GuzzleException $e) {
        echo $e->getMessage();
    }

    if (!$pageContent) {
        return false;
    }

    $fileName = $dirToSave . '/' . $convertor->create($pageUrl);
    return $saver->savePage($pageContent, $fileName);
}