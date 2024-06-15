<?php

namespace Database\Seeders;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\NewsItem;

class NewsItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/news.json');
        $data = json_decode($json, true)['channel']['item'];

        foreach ($data as $item) {
            NewsItem::create([
                'title' => $item['title'],
                'description' => strip_tags($item['description']),
                'link' => $item['link'],
                'guid' => $item['guid'],
                'pubDate' => $item['pubDate'],
                'creator' => (isset($item['dc:creator'])) ? $item['dc:creator']['#text'] : null,
                'image_url' => $item['enclosure']['@url'] ?? null,
            ]);
        }
    }
}
