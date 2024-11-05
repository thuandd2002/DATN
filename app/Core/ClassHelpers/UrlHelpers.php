<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/7/18
 * Time: 12:28 AM
 */

namespace App\Core\ClassHelpers;


class UrlHelpers
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Hàm build url
     * @param array $params
     * @param null $url
     * @return string
     * Cách sử dụng: UrlHelper::addParams(['filter', 1])
     */
    public static function addParams(array $params = array(), $url = null)
    {
        if (is_null($url)) {
            $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }

        $parseUrl = parse_url($url);
        $query = isset($parseUrl['query']) ? $parseUrl['query'] : "";
        if ($query) {
            parse_str($query, $parseQuery);
            $params = array_merge($parseQuery, $params);
        }

        ksort($params);
        $urlReturn = [
            isset($parseUrl['scheme']) ? $parseUrl['scheme'] : 'http',
            '://',
            $parseUrl['host'],
            isset($parseUrl['path']) ? $parseUrl['path'] : '',
            '?',
            urldecode(http_build_query($params))
        ];

        return implode('', $urlReturn);
    }

    /**
     * Remove a param url
     * @param $key
     */
    public static function removeParam($key)
    {
        $string = null;
        $url    = self::getRequestUrl();
        $parsed = parse_url($url);
        if (isset($parsed['query']) && $parsed['query'])
        {
            parse_str($parsed['query'], $params);
            unset($params[$key]);
            $string = '?' . urldecode(http_build_query($params));
        }
        return self::getRequestUrl(false) . $string;
    }

    /**
     * Nhận toàn bộ thông tin url
     * @param boolean $full : giá trị dành cho nhận full hoặc chỉ nhận url
     * @return string
     */
    public static function getRequestUrl($full = true)
    {
        return $full ? \Request::fullUrl() : \Request::url();
    }

    /**
     * LAY TAT CA CAC THAM SO DANG TRUY VAN TREN URL
     * @param array $params
     * @param null $url
     * @return array
     */
    public static function getParamRequestUri($params = [], $url = null)
    {
        if (is_null($url)) {
            $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }

        $parseUrl = parse_url($url);
        $query = isset($parseUrl['query']) ? $parseUrl['query'] : "";
        if ($query) {
            parse_str($query, $parseQuery);
            $params = array_merge($parseQuery, $params);
        }

        ksort($params);
        return $params;
    }
}