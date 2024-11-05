<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/7/18
 * Time: 9:13 AM
 */
namespace MetaSeo\Controllers;

use Illuminate\Routing\Controller;

class MetaSeoController extends Controller
{
    protected $options = array();
    protected $metaTitle;
    protected $metaDescription;
    protected $metaKeywords;
    protected $metaImage ;
    protected $metaRobots;
    protected $sizeImage;
    private   $widthImage        = '600';
    private   $heightImage       = '315';

    protected $metaDefault = [
        'image'     => 'images/social.png',
        'robots'    => 'NOINDEX, NOFOLLOW',
        'domain'    => ''
    ];
    protected $detail_page = false;
    protected $uc_word_title = true;

    protected $webpage ;
    private $typeSeo           = 0; // Chưa biết làm gì
    private $language          = 'vi';
    private $prefixKeyword     = '';
    private $suffixKeyword     = '';

    public static function MetaSeo($options = array())
    {
        $self = new self();
        $self->options = $options;

        $self->setMetaTitle();
        $self->setMetaDescription();
        $self->setMetaKeywords();
        $self->setMetaImage();
        $self->setMetaRobots();

        return $self;
    }

    public function setMetaTitle()
    {
        return $this->metaTitle = array_get($this->options,'meta_title','');
    }

    public function setMetaDescription()
    {
        return $this->metaDescription = array_get($this->options,'meta_desciption','');
    }

    public function setMetaKeywords()
    {
        return $this->metaKeywords = array_get($this->options,'meta_keywords','');
    }

    public function setMetaImage()
    {
        return $this->metaImage = array_get($this->options,'meta_image',$this->metaDefault['image']);
    }

    public function setMetaRobots()
    {
        return $this->metaRobots = array_get($this->options,'meta_robots',$this->metaDefault['robots']);
    }

    public function renderMetaSeo()
    {
        $that  = $this;
        $meta = '<meta charset="UTF-8">';
        $meta .= '<title>'.$that->metaTitle.'</title>';
        $meta .= '<meta name="description" content="'.$that->metaDescription.'"/>';
        $meta .= '<meta name="keywords" itemprop="keywords" content="'.$that->metaKeywords.'"/>';
        $meta .= '<meta name="language" content="vietnamese"/>';
        $meta .= '<meta name="csrf-token" content="'.csrf_token().'">';

        if ($that->metaImage)
        {
            $image = strpos($that->metaImage, '__') !== false ? pare_url_file($that->metaImage) :  $that->metaImage;
            if($image)
            {
                $meta .= '<meta itemprop="image" content="'.$image.'">
                            <meta property="og:image" content="'.$image.'" />
                            <meta property="og:image:width" content="'.$that->widthImage.'">
	                        <meta property="og:image:height" content="'. $that->heightImage .'">';
            }
        }

        $meta .= '<meta name="author" content="Đang cập nhật">';
        $meta .= '<meta http-equiv="content-language" content="vi" />';
        $meta .= '<meta name="GENERATOR" content="">';
        $meta .= '<meta name="copyright" content="Copyright © 2018 by ">';
        $meta .= '<meta property="og:description" content="'.$this->metaDescription.'">';
        $meta .= '<meta property="og:locale" content="vi_VN" />';
        $meta .= '<meta property="og:title" itemprop="name" content="'.$this->metaTitle.'">';
        $meta .= '<meta name="ROBOTS" content="'.$this->metaRobots.'">';
        $meta .= '<link rel="canonical" href="'.\Request::url().'" />';
        $meta .= '<link rel="shortcut icon" type="image/png" href="'.\URL::to("favicon.png").'">';

        return $meta;
    }
}
