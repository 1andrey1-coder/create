<?php

use function DI\create;
use function DI\get;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;



return [

    'FrontLoader' => create(FilesystemLoader::class)
        ->constructor( __DIR__.'/../template/frontend'),
    'BackLoader' => create(FilesystemLoader::class)
        ->constructor(__DIR__.'/../template/backend'),
    'FrontTwig' => create(Environment::class)
        ->constructor(get('FrontLoader', [])),
    'BackTwig' => create(Environment::class)
        ->constructor(get('BackLoader', [])),
    'FrontView' => create(\App\FrontEndView::class)
        ->constructor(get('FrontTwig')),
    'Model'=> create(\App\Model::class),
    'BackView' => create(\App\BackEndView::class)
        ->constructor(get('BackTwig', [])),

    'PDO'=>function(){
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        return new PDO($_ENV['DB_PDO_DSN'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $opt);

    },
    'PDOModel'=>create(\App\ModelPDO::class)
        ->constructor(get('PDO')),

    App\BackEndController:: class=>create(\App\BackEndController::class)
        ->constructor(
            get('Model'),
            get('BackView')),
    App\PDOFrontentControler::class=>create(App\PDOFrontEntControler::class)
        ->constructor(get('PDOModel')),
//    App\OpisFrontendController::class=>create(App\OpisFrontEndController::class)
//        ->constructor(get('OpisModel')),
    App\FrontEndController::class => create( App\FrontEndController::class)
        ->constructor(
            get('FrontView'),
            get('Model')
        )
];