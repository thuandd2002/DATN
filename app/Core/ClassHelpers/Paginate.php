<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/17/18
 * Time: 8:31 AM
 */

namespace App\Core\ClassHelpers;


class Paginate
{
    public function appendQuery($append=[], $page = array(), $url = null)
    {
        $append = $page ? array_merge($append, $page) : $append;

        return UrlHelpers::getInstance()->addParams($append, $url);
    }

    public function render_my_paginate($perPage, $currentPage, $total, $append = array(), $url= null)
    {
        $lastPage = (int)ceil($total / $perPage);
        $adjacents = 2;
        if ($currentPage > $lastPage) $currentPage = $lastPage;

        $next       = $currentPage + 1;
        $previous   = $currentPage - 1;
        $pagination = '';

        if ($lastPage > 1)
        {
            $pagination .= "<ul class='pagination'>";
            if ($currentPage >= 1)
            {
                $notAllowed  = ($currentPage == 1) ? 'isDisabled' : '';
                $pagination .= '<li><a title="Về trang đầu" class="current" href="'.$this->appendQuery($append, ['page' => 1], $url).'" rel="nofollow"><<</a></li>';
                $pagination .= '<li><a title="Về trang trước" rel="nofollow"
                                        class="current '.$notAllowed.'" href="'.$this->appendQuery($append, ['page' => $previous], $url).'"><</a></li>';
            }

            if ($lastPage < 7 + ($adjacents * 2))
            {
                for ($counter = 1; $counter <= $lastPage; $counter++)
                {
                    $pagination .= ($counter == $currentPage)
                        ? '<li class="active"><a rel="nofollow">'.$counter.'</a></li>'
                        : '<li><a href="'.$this->appendQuery($append, ['page' => $counter], $url).'" rel="nofollow">'.$counter.'</a></li>';
                }
            } elseif ($lastPage > 5 + ($adjacents * 2))
            {

                if ($currentPage < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents); $counter++)
                    {
                        $pagination .= ($counter == $currentPage)
                            ? '<li class="active"><a rel="nofollow">'.$counter.'</a></li>'
                            : '<li><a href="'.$this->appendQuery($append, ['page' => $counter], $url).'" rel="nofollow">'.$counter.'</a></li>';
                    }
                }
                elseif ($lastPage - ($adjacents * 2) > $currentPage && $currentPage > ($adjacents * 2))
                {
                    for ($counter = $currentPage - $adjacents; $counter <= $currentPage + $adjacents; $counter++)
                    {
                        $pagination .= ($counter == $currentPage)
                            ? '<li class="active"><a rel="nofollow">'.$counter.'</a></li>'
                            : '<li><a href="'.$this->appendQuery($append, ['page' => $counter], $url).'" rel="nofollow">'.$counter.'</a></li>';
                    }
                }
                else
                {
                    for ($counter = $lastPage - (($adjacents * 2)); $counter <= $lastPage; $counter++)
                    {
                        $pagination .= ($counter == $currentPage)
                            ? '<li class="active"><a rel="nofollow">'.$counter.'</a></li>'
                            : '<li><a href="'.$this->appendQuery($append, ['page' => $counter], $url).'" rel="nofollow">'.$counter.'</a></li>';
                    }
                }
            }

            if ($currentPage <= $counter - 1)
            {
                $notAllowed  = ($currentPage == $lastPage) ? 'isDisabled' : '';
                $pagination .= '<li><a class="'.$notAllowed.'" href="'.$this->appendQuery($append, ['page' => $next]).'" rel="nofollow"> > </a></li>';
                $pagination .= '<li><a href="'.$this->appendQuery($append, ['page' => $lastPage], $url).'"  rel="nofollow">>></a></li>';
            }

            $pagination .= "</ul>";
        }

        return $pagination;
    }
}