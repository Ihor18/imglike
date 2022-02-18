<?php

namespace App\Console\Commands;

use App\Models\Video;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
use App;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    public static $languages = ['en', 'ru', 'ua', 'de', 'fr', 'it', 'es', 'pt'];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $videos_bd = Video::pluck('url')->toArray();
        $videos_chunk = array_chunk($videos_bd, 50000);
        $domain = 'https://tetris.online';
        $ignore_url = [];

        $indexSitemap = SitemapIndex::create($domain);

        foreach ($videos_chunk as $key=>$video){
            echo '<=== sitemap-pages-en-'.$key.".xml ===>\n";
            SitemapGenerator::create($domain)
                ->hasCrawled(function (Url $url) use ($key, $video, &$ignore_url) {
                    echo '.';
                    if ($url->path() == '' && !in_array($url->path(), $ignore_url)) {
                        echo "\npage-en-".$key.' => ' . $url->path()."\n";
                        $ignore_url[] = $url->path();
                        $url->setPriority(1)->setLastModificationDate(Carbon::now());
                        return $url;
                    }
                    if (
                        isset($url->segments()[0])
                        && !in_array($url->segments()[0], self::$languages)
                        && isset($url->segments()[1]) && in_array($url->segments()[1], $video)
                    ) {
                        echo "\nuser-en-".$key.' => ' . $url->path()."\n";
                        return $url;
                    }
                    if (
                        count($url->segments()) == 1
                        && !in_array($url->segments()[0], self::$languages)
                        && !in_array($url->path(), $ignore_url)
                    ) {
                        echo "\npage-en-".$key.' => ' . $url->path()."\n";
                        $ignore_url[] = $url->path();
                        $url->setPriority(0.5)->setLastModificationDate(Carbon::now());
                        return $url;
                    }
                })->writeToFile(public_path('sitemap-pages-en-'.$key.'.xml'));
            echo "\n<=== sitemap-pages-ru-".$key.".xml ===>\n";
            $indexSitemap->add('/sitemap-pages-en-'.$key.'.xml');
            SitemapGenerator::create($domain)
                ->hasCrawled(function (Url $url) use ($key, $video, &$ignore_url) {
                    echo '.';
                    if ($url->path() == '/ru' && !in_array($url->path(), $ignore_url)) {
                        echo "\npage-ru-".$key.' => ' . $url->path()."\n";
                        $ignore_url[] = $url->path();
                        $url->setPriority(1)->setLastModificationDate(Carbon::now());
                        return $url;
                    }
                    if (
                        isset($url->segments()[0])
                        && $url->segments()[0] == 'ru'
                        && isset($url->segments()[2])
                        && in_array($url->segments()[2], $video)
                    ) {
                        echo "\nuser-ru-".$key.' => ' . $url->path()."\n";
                        return $url;
                    }
                    if (
                        count($url->segments()) == 2
                        && $url->segments()[0] == 'ru'
                        && !in_array($url->path(), $ignore_url)
                    ) {
                        echo "\npage-ru-".$key.' => ' . $url->path()."\n";
                        $ignore_url[] = $url->path();
                        $url->setPriority(0.5)
                            ->setLastModificationDate(Carbon::now());
                        return $url;
                    }
                })->writeToFile(public_path('sitemap-pages-ru-'.$key.'.xml'));
            echo "\n";
            $indexSitemap->add('/sitemap-pages-ru-'.$key.'.xml');
        }
        $indexSitemap->writeToFile(public_path('sitemap-index.xml'));
    }
}
