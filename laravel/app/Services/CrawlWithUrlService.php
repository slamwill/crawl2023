<?php
namespace App\Services;

use Goutte\Client;

class CrawlWithUrlService
{
    public function crawlPage($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $today = date("Y-m-d H:i:s");
        $title = $description = $body = 'Not available';
    
        if ($crawler->filter('title')->count()) {
            $title = $crawler->filter('title')->text();
        }
    
        if ($crawler->filter('meta[name="description"]')->count()) {
            $description = $crawler->filter('meta[name="description"]')->attr('content');
        }

        if ($crawler->filter('body')->count()) {
            $body = $crawler->filter('body')->text();
        }

        return [
            'crawledResults' => [
                'Screenshot' => 'some link for picture',
                'title' => $title,
                'link' => $url,
                'description' => $description,
                'createdAt' => $today,
            ],
            'detailPage' => [
                'Screenshot' => 'some link for picture',
                'title' => $title,
                'link' => $url,
                'description' => $description,
                'body' => $body,
                'createdAt' => $today,
            ],
        ];
    }
}
