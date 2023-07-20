<?php

namespace App\Http\Controllers;


use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $frd = $request->all();
//        dd($frd);
//        $news=DB::table('$news')->orderBy('id');
        if (isset($frd['order_by']) and isset($frd['search'])) {
            $news = News::query()->orderBy($frd['order_by'])
                ->where('name', '=', $frd['search'])
                ->get();
        } else {
            $news = News::query()->orderBy('ordering')->get();
        }
        return view('crm.news.news', compact('news'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */


    public function create()
    {
        return view('crm.news.news-created');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(NewsRequest $request)
    {
        $frd = $request;
        /**
         * @var News $news
         */


        $news = News::create([
            'name' => $frd['name'],
            'image_url' => $frd['image_url'],
            'description' => $frd['description'],
            'ordering' => $frd['ordering'],
            'is_published' => $frd['is_published'] == '1'
        ]);


        if (isset($frd['image_url'])) {

            /**
             * @var Media $newsMedia
             */
            $newsMedia = $news->addMedia($request->file('image_url'))->toMediaCollection('news-imgs');

            if ($newsMedia !== null) {
                $news->setImageUrl(str_replace(config('app.url'), '', $newsMedia->getUrl()));
                $news->save();
            }
        }
        return redirect()->route('crm.news.index');
    }

    public function published(Request $request, News $news)
    {
        $frd = $news;

        $news->update([
            'is_published' => $frd['is_published'] == '1' ? '0' : '1'
        ]);
        $news->save();


        return redirect()->route('crm.news.index');
    }

    public function destroy(Request $request, News $news)
    {
        $news->delete();


        return redirect()->route('crm.news.index');
    }

    public function edit(Request $request, News $news)
    {
        return view('crm.news.news-edit', compact('news'));
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(NewsRequest $request, News $news)
    {
        $frd = $request;
        $news->update([
            'name' => $frd['name'] ?? '',
            'image_url' => $frd['image_url'] ?? '',
            'description' => $frd['description'] ?? '',
            'ordering' => $frd['ordering'] ?? '',
        ]);
        if (isset($frd['image_url'])) {

            /**
             * @var Media $newsMedia
             */
            $newsMedia = $news->addMedia($request->file('image_url'))->toMediaCollection('news-imgs');

            if ($newsMedia !== null) {
                $news->setImageUrl(str_replace(config('app.url'), '', $newsMedia->getUrl()));
                $news->save();

                $news->save();
            }
        }
        return redirect()->route('crm.news.index');
    }
}
