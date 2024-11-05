<?php

namespace Modules\Crawler\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Crawler\Models\Keyword\KeywordTemp;

class CrawlerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($start, $stop)
    {

        for($i = $start; $i <= $stop ; $i ++)
        {
            $html = file_get_html('https://stackoverflow.com/tags?page='.$i);

            foreach ($html->find('#tags-browser > div > a.post-tag') as $link) {        
                try{
                    KeywordTemp::insert([
                        'kt_name' => trim(mb_strtolower($link->plaintext)),
                        'kt_slug' => str_slug(mb_strtolower($link->plaintext)),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }catch (\Exception $e) {
                    dump("[Log Tags Exists => ]" .$link->plaintext);
                }
            }

            dump("PAGE => [".$i."]");
        }
        return view('crawler::index');
    }

    public  function getOne()
    {
        
        $html = file_get_html('http://phim.keeng.vn/hanh-dong_cat6');
    
        foreach($html->find('#video-List > div > div > h3 > a') as $link)
        {
            dd($link);
//            preg_match('/(\w+\s*)+(?!(\d+))/mi',$link->plaintext,$data);
            
            if (isset($data)  && isset($data[0]))
            {
                try{
                    KeywordTemp::insert([
                        'kt_name' => trim(mb_strtolower($data[0])),
                        'kt_slug' => str_slug(mb_strtolower($data[0])),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }catch (\Exception $e) {
                    dump("[Log Tags Exists => " .$data[0]."]");
                }
            }
        }
    }

    public function init()
    {
        $base = 'http://phim.keeng.vn/hanh-dong_cat6';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $base);
        curl_setopt($curl, CURLOPT_REFERER, $base);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $str = curl_exec($curl);
        curl_close($curl);

        $html_base = new \simple_html_dom();
        $html_base->load($str);

        dd($html_base);
        foreach($html_base->find('##tags-browser > div  > a') as $element) {
            echo "<pre>";
            print_r( $element->href );
            echo "</pre>";
        }

        $html_base->clear();
    }
}
