<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function showXML()
    {

        // create new sitemap object
        $sitemap = App::make("sitemap");

        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        //$sitemap->setCache('laravel.sitemap', 30); //60

        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached())
        {
            // add item to the sitemap (url, date, priority, freq)
            // 메인페이지
            $sitemap->add(URL::to('/'), '2016-01-25T20:10:00+02:00', '1.0', 'daily');
            $sitemap->add(URL::to('ccmail/sample'), '2016-01-26T12:30:00+02:00', '0.8', 'weekly');

            // 도움말페이지
            $sitemap->add( URL::to( '/help/ccmail' ), '2016-3-23', 0.9, 'weekly');

            /*// add item with translations (url, date, priority, freq, images, title, translations)
            $translations = [
                ['language' => 'ko', 'url' => URL::to('pageKo')],
                ['language' => 'de', 'url' => URL::to('pageDe')],
                ['language' => 'bg', 'url' => URL::to('pageBg')],
            ];
            $sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);*/

            /*// add item with images
            $images = [
                ['url' => URL::to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
                ['url' => URL::to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
                ['url' => URL::to('images/pic3.jpg'), 'title' => 'Image title3'],
            ];
            $sitemap->add(URL::to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);*/

            // 내용증명 개별
            $posts = DB::table('ccmail_samples')->groupBy('cate1')->get();
            foreach ($posts as $post)
            {
                //$sitemap->add($post->slug, $post->modified, $post->priority, $post->freq);
                $sitemap->add( URL::to( '/ccmail/cate/'.$post->cate1 ), $post->created_at, 0.9, 'daily');
            }

            // 내용증명 개별
            $posts = DB::table('ccmail_samples')->orderBy('created_at', 'desc')->get();
            foreach ($posts as $post)
            {
                //$sitemap->add($post->slug, $post->modified, $post->priority, $post->freq);
                $sitemap->add( URL::to( '/ccmail/sample/'.$post->id ), $post->created_at, 0.7, 'weekly');
            }


        }

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }
}
