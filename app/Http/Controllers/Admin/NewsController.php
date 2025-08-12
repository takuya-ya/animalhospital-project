<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Services\NewsService;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->middleware('auth.admin');
        $this->newsService = $newsService;
    }

    /**
     * お知らせ一覧表示
     */
    public function index()
    {
        $news = News::latest()->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    /**
     * お知らせ投稿フォーム表示
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * お知らせを保存
     */
    public function store(StoreNewsRequest $request)
    {
        $this->newsService->create($request->getServiceData());

        return redirect()->route('admin.news.create')
            ->with('success', 'お知らせを投稿しました。');
    }

    /**
     * お知らせ詳細表示
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * お知らせ編集フォーム表示
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * お知らせを更新
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $this->newsService->update($news, $request->getServiceData());

        return redirect()->route('admin.news.index')
            ->with('success', 'お知らせを更新しました。');
    }

    /**
     * お知らせを削除
     */
    public function destroy(News $news)
    {
        $this->newsService->delete($news);

        return redirect()->route('admin.news.index')
            ->with('success', 'お知らせを削除しました。');
    }
}
