<?php

return [
    'prefix' => 'admin/news',
    'middleware' => ['web', 'adminMiddleware'],
    'guard' => 'admins',
    'pagination' => [
        'news' => 5,
    ],


    'routes' => [
        'index' => [
            'name' => 'admin.news',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'index',
            'request_type' => 'get',
            'uri' => '/',

        ],

        'list' => [
            'name' =>'admin.news.list',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'getList',
            'request_type' => 'get',
            'uri' => 'list',

        ],

        'create' => [
            'name' => 'admin.news.create',
            'controller' => \App\Http\Controllers\Admin\AdminNewsController::class,
            'method' => 'create',
            'request_type' => 'get',
            'uri' => 'create',


        ],

        'store' => [
            'name' => 'admin.news.store',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'store',
            'request_type' => 'post',
            'uri' => 'store',


        ],

        'edit' => [
            'name' => 'admin.news.edit',
            'controller' => \App\Http\Controllers\Admin\AdminNewsController::class,
            'method' => 'edit',
            'uri' => '{id}/edit',
            'request_type' => 'get',

        ],


        'update' => [
            'name' => 'admin.news.update',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'update',
            'uri' => '{id}/update',
            'request_type' => 'post',

        ],

        'delete' => [
            'name' => 'admin.news.delete',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'delete',
            'uri' => '{id}/delete',
            'request_type' => 'get',

        ],

        'media' => [
            'name' => 'admin.news.media',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'media',
            'request_type' => 'post',
            'uri' => '{newsId}/media',


        ],

        'deleteMedia' => [
            'name' => 'admin.news.delete.media',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'deleteMedia',
            'request_type' => 'get',
            'uri' => '{newsId}/delete-media',


        ],

        'mainMedia' => [
            'name' => 'admin.news.main.media',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'mainMedia',
            'uri' => '{newsId}/{mediaId}/main-media',
            'request_type' => 'get',

        ],


        'imageCrop' => [
            'name' => 'admin.news.image.crop',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'imageCrop',
            'uri' => '{newsId}/crop',
            'request_type' => 'get',

        ],

        'imageCropStore' => [
            'name' => 'admin.news.image.crop.store',
            'controller' => \StarterKit\News\Http\Controllers\NewsController::class,
            'method' => 'imageCropStore',
            'uri' => '{newsId}/crop-store',
            'request_type' => 'post',

        ]
    ],

    'views' => [

    ],


];
