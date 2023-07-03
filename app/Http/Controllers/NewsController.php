<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;


class NewsController extends Controller
{
    public function index(News $news)
    {
//        $news=DB::table('$news')->orderBy('id');
        $news = $news->orderByDesc('name')->get();
        return view('crm.news.news', compact('news'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(Request $request)
    {
        return view('crm.news.news-created');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function store(Request $request)
    {
        $frd = $request;
        /**
         * @var News $news
         */

        $news = News::create([
            'name' => $frd['name'],
            'image_url' => $frd['image_url'],
            'discription' => $frd['discription'],
            'ordering' => $frd['ordering']
        ]);

        if (isset($frd['image_url'])) {

            /**
             * @var Media $newsMedia
             */
            $newsMedia = $news->addMedia($request->file('image_url'))->toMediaCollection('news-imgs')->first();

            if ($newsMedia !== null) {
                $news->setImageUrl(str_replace(config('app.url'), '', $newsMedia->getUrl()));
                $news->save();
            }
        }
        return redirect()->route('crm.news.index');
    }
    public function destroy(Request $request, News $news)
    {
        $news->delete($request);


        return redirect()->route('crm.news.index');
    }
}
