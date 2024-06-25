<?php
return [
   'module' => [
        [
            'title'=> 'Quản lý người dùng',
            'icon' => 'fas fa-fw fa-users-cog',
            'name'=> ['user'],
            'target'=>'user',
            'subModule' => [
               [
                  'title' => 'Quản lý thành viên',
                  'route' => 'user/index'
               ],
               [
                  'title'=> 'Quản lý nhóm thành viên',
                  'route' => 'user/catalogue/index'
               ]
            ]
               
         ],
         [
            'title'=> 'Quản lý bài viết',
            'icon'=> 'fas fa-fw fa-book',
            'name'=> ['post'],
            'target'=>'post',
            'subModule' =>[
               [
                  'title'=> 'Quản lý bài viết',
                  'route'=> 'post/index'
               ],
               [
                  'title'=> 'Quản lý nhóm bài viết',
                  'route'=> 'post/catalogue/index'
               ]
            ]
               ],
         [
            'title'=> 'Cấu hình chung',
            'icon'=> 'fas fa-fw fa-cogs',
            'name' => ['language'],
            'target'=>'language',
            'subModule' =>[
               [
                  'title'=> 'Quản lý ngôn ngữ',
                  'route'=> 'language/index'
               ]
            ]
         ]
                  
      ],
   
];


?>
