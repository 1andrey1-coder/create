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
    //'OpisConn'=>create(Connection::class)
    //->constructor(get($connectionOpis)),
    'OpisConnection' => function( ){
        $connectionOpis = new Connection(
            $_ENV['DB_DSN'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']);
        $connectionOpis->options([
            PDO::FETCH_ASSOC=>true,
            PDO::ATTR_STRINGIFY_FETCHES=> false]);
        return $connectionOpis;
    },
    'OpisDB'=>create(Database::class)
        ->constructor(get('OpisConnection')),
    'OpisModel'=>create(\App\OpisModel::class)
        ->constructor(get('OpisDB')),
    'OpisFrontCntrl'=>create(\App\OpisFrontendController::class)
        ->constructor(get('OpisModel')),
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

    Ebog\BackendController:: class=>create(\App\BackEndController::class)
        ->constructor(
            get('Model'),
            get('BackView')),
    Ebog\PDOFrontentControler::class=>create(App\PDOFrontEntControler::class)
        ->constructor(get('PDOModel')),
    Ebog\OpisFrontendController::class=>create(App\OpisFrontEndController::class)
        ->constructor(get('OpisModel')),
    Ebog\FrontendController::class => create( App\FrontEndController::class)
        ->constructor(
            get('FrontView'),
            get('Model')

        )
];