<?php

return [
    'sections' => [
        'manage' => [
            'title' => 'Администрирование',
            'items' => [
                [
                    'is_tree' => false,
                    'title' => 'Администраторы',
                    'route_name' => 'admin.admins',
                    'item_active_on' => 'admin/admins*',
                    'icon' => 'la la-users',
                    'roles' => [
                        'admin'
                    ]
                ]
            ],
            'roles' => [
                'admin'
            ]
        ],

        'modules' => [
            'title' => 'Модули',
            'items' => [
                [
                    'is_tree' => false,
                    'title' => 'Новости Шаблон',
                    'route_name' => 'admin.news',
                    'item_active_on' => 'admin/news',
                    'icon' => 'la la-bullhorn',
                    'roles' => [
                        'admin',
                        'manager'
                    ]
                ],
                [
                    'is_tree' => false,
                    'title' => 'Заказ Звонков',
                    'route_name' => 'call-back.index',
                    'item_active_on' => 'admin/news',
                    'icon' => 'la la-bullhorn',
                    'roles' => [
                        'admin',
                        'manager'
                    ]
                ],
                [
                    'is_tree' => false,
                    'title' => 'Связаться со мной',
                    'route_name' => 'contacts.index',
                    'item_active_on' => 'admin/news',
                    'icon' => 'la la-bullhorn',
                    'roles' => [
                        'admin',
                        'manager'
                    ]
                ]
            ],
            'roles' => [
                'admin',
                'manager'
            ]
        ],

        'reports' => [
            'title' => 'Модерация',
            'items' => [

            ],
            'roles' => [
                'admin',
                'manager'
            ]
        ],
    ],
];
