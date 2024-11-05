<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/25/18
 * Time: 12:54 AM
 */

namespace Modules\Product\Services;

class ListRouteProductService
{
    protected $listRoute = [
        [
            'name' => 'Quản lý sản phẩm',
            'route' => 'get.list.product',
            'icon' => 'icon-note',
            'permissions' => [
                'article_index|full',
            ]
        ],
    ];

    public function getListRouteProduct()
    {
        return $this->listRoute;
    }

}