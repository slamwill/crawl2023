<?php
namespace App\Services;

use Goutte\Client;

class CrawlWithUrlService
{
    public function crawlPage($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $title = $crawler->filter('title')->text();
        $description = $crawler->filter('meta[name="description"]')->attr('content');
        $body = $crawler->filter('body')->text();
        $today = date("Y-m-d H:i:s");

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
