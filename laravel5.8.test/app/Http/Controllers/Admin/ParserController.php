<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Links;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $links = Links::getLinks();

        $news = [];
        $categories = [];

        foreach ($links as $link) {
            $parser = XmlParser::load($link);

            $news[] = $parser->parse([
                $link => ['uses' => 'channel.item[title,link,description]']
            ]);

            $categories[] = $parser->parse([
                'category' => ['uses' => 'channel.title'] ?? ['uses' => 'channel.item.category']
            ]);
        }

        dump($news);
        dd($categories);
    }
}
