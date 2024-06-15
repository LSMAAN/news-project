<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use Carbon\Carbon;

class NewsItemContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request['search'] ?? '';
        $sort = $request->input('sort', 'pubDate');
        $newsItemsQuery = NewsItem::query();

        if ($query) {
            $newsItemsQuery->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('creator', 'like', '%' . $query . '%');
            });
        }

        //Sort the data according to sorting parameter
        $newsItems = $newsItemsQuery->orderBy($sort, 'asc')->paginate(15);
        // Format pubDate field using Carbon
        foreach ($newsItems as $item) {
            $item->formattedPubDate = Carbon::parse($item->pubDate)->format('M d, Y, H:i T');
        }

        $data = compact('newsItems');
        return view('home')->with($data);
    }
}
