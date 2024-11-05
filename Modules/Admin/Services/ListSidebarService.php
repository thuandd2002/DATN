<?php

namespace Modules\Admin\Services;
//use Modules\Admin\Models\Accounts\Admin;
//use Modules\Admin\Models\Accounts\Role;


class ListSidebarService
{

    private $listSidebar = [
        [
            'name' => 'Thống kê tổng',
            'route' => 'get.chart',
            'icon' => 'icon-speedometer',
            'permissions' => [
                'quan-tri-website',
                // 'truy-cap-website',
            ]
        ],
        [
            'name' => 'Thống kê của tôi',
            'route' => 'get.my-chart',
            'icon' => 'icon-speedometer',
            'permissions' => [
                // 'quan-tri-website',
                // 'truy-cap-website',
                'thong-ke-cua-toi'
            ]
        ],
        // [
        //     'name' => 'Biểu đồ thông kê',
        //     'route' => 'get.chart',
        //     'icon' => 'icon-speedometer',
        //     'permissions' => ['dashboard:full']
        // ],
        [
            'name' => 'Quản lý Menu',
            'route' => 'get.list.menu',
            'icon' => 'icon-list',
            'permissions' => [
                'quan-ly-menu',
                'quan-tri-website',
            ]
        ],
    
        [
            'name' => 'Danh sách ô tô nhập',
            'route' => 'get.list.productImport',
            'icon' => 'icon-tag icons',
            'permissions' => [
                'quan-ly-san-pham',
                'quan-tri-website',
            ]
        ],
        
        [
            'name' => 'Danh sách ô tô xuất',
            'route' => 'get.list.product',
            'icon' => 'icon-tag icons',
            'permissions' => [
            'quan-ly-san-pham',
            'quan-tri-website',
            ]
        ],
        [
            'name' => 'Quản lý bài viết',
            'route' => 'get.list.article',
            'icon' => 'icon-note',
            'permissions' => [
                'quan-tri-website',
                'quan-ly-bai-viet',
            ]
        ],

        [
            'name' => 'Quản lý khách hàng',
            'icon' => 'icon-puzzle',
            'permissions' => [
                'quan-tri-website',
                'danh-sach-khach-hang',
                'quan-ly-binh-luan',
                'danh-sach-lich-xem-xe',
            ],
            'menu' => [
                [
                    'name' => 'Danh sách khách hàng',
                    'route' => 'get.list.guest',
                    'icon' => 'icon-user icons',
                    'permissions' => [
                        'danh-sach-khach-hang',
                        'quan-tri-website',
                    ]
                ],
                [
                    'name' => 'Quản lý Comment',
                    'route' => 'get.list.comment',
                    'icon' => 'icon-bubble icons',
                    'permissions' => [
                        'quan-ly-binh-luan',
                        'quan-tri-website',
                    ]
                ],
                [
                    'name' => 'Danh sách lịch xem xe',
                    'route' => 'get.list.orders',
                    'icon' => 'icon-bubble icons',
                    'permissions' => [
                        'quan-tri-website',
                        'danh-sach-lich-xem-xe',
                    ]
                ],
                [
                    'name' => 'Quản lý Đánh Giá',
                    'route' => 'get.list.rating',
                    'icon' => 'icon-star icons',
                    'permissions' => [
                        'quan-ly-danh-gia',
                        'quan-tri-website',
                    ]
                ],
                [
                    'name' => 'Nhập thông tin khách hàng đặt lịch không qua web',
                    'route' => 'get.insert.order',
                    'icon' => 'icon-bubble icons',
                    'permissions' => [
                        'quan-tri-website',
                        'danh-sach-lich-xem-xe',
                    ]
                ]
            ],
        ],
        [
            'name' => 'Dữ liệu hệ thống',
            'icon' => 'icon-cloud-download',
            'permissions' => [
                'quan-tri-website',
                'quan-ly-thong-tin-website',
            ],
            'menu' => [
                [
                    'name' => 'Thông tin website',
                    'route' => 'get.info.information',
                    'icon' => 'icon-tag icons',
                    'permissions' => [
                        'quan-tri-website',
                        'quan-ly-thong-tin-website',
                    ]
                ],
                [
                    'name' => 'Slide trang chủ',
                    'route' => 'get.list.slide',
                    'icon' => 'icon-tag icons',
                    'permissions' => [
                        'quan-tri-website',
                        'quan-ly-slide',
                    ]
                ],
            ],
        ],
        [
            'name' => 'Phân quyền Quản trị',
            'icon' => 'icon-energy',
            'permissions' => [
                'quan-tri-website',
                'quan-ly-vai-tro',
            ],
            'menu' => [
                [
                    'name' => 'QL Quyền',
                    'route' => 'get.list.permission',
                    'icon' => 'icon-tag icons',
                    'permissions' => [
                        'quan-tri-website',
                        'quan-ly-vai-tro',
                    ]
                ],
                [
                    'name' => 'Vai trò',
                    'route' => 'get.list.role',
                    'icon' => 'icon-tag icons',
                    'permissions' => [
                        'quan-tri-website',
                        'quan-ly-vai-tro',
                    ]
                ],
                [
                    'name' => 'QL Admin',
                    'route' => 'get.list.admin',
                    'icon' => 'icon-tag icons',
                    'permissions' => [
                        'quan-tri-website',
                        'quan-ly-admin',
                    ]
                ],
                
            ],
        ],
        [
            'name' => 'Đăng xuất',
            'route' => 'AdminLogout',
            'icon' => 'icon-tag icons',
            'permissions' => []
        ]
    ];

    public function getListSidebar()
    {
        return $this->listSidebar;
    }

    public function getCurrentListRoute($index)
    {
        $_arr = [];
        if (isset($this->listSidebar[$index]['menu']))
            foreach ($this->listSidebar[$index]['menu'] as $item)
                array_push($_arr, $item['route']);
        return $_arr;
    }
}