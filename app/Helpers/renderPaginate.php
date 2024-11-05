<?php

if ( ! function_exists('renderPaginate'))
{
    /**
     * @param $currentPage
     * @param $perPage
     * @param $lastPage
     * @param $link
     * @return string
     * echo paginate
     */
    function renderPaginate($paginate,$filter = '')
    {
        return '<div class="custome-paginate clearfix" style="padding:0 20px">
                <div class="pull-left mg-t-b-27">
                    <p>Trang <b>'.$paginate->currentPage().'</b> - Số bản ghi hiển thị <b>'.$paginate->perPage().'</b> - Tổng số trang <b>'.$paginate->lastPage().'</b> - Tổng số bản ghi <b>'.$paginate->total().'</b></p>
                </div>
                <div class="pull-right">'.$paginate->appends($filter)->links().'</div>
            </div>';
    }
}