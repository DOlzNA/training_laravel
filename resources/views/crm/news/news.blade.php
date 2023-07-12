@extends('crm.layouts.app')
@section('content')

    <div class="container wrapper-primary py-3 px-4">

        <div class="row justify-content-between pb-2">

            {{--            не сортирует по id--}}
            {{--            сброс не работает--}}
            {{--            поиск и сортировка работают одновременоо без разделения--}}

            <div class="col-lg">
                <form method="GET" action="{{route('crm.news.index')}}" accept-charset="UTF-8"
                      onchange="this.submit()">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class=" form-group position-relative  ">
                                <label class="form-control-label " for="input_5350_order-by">Сортировка&nbsp;</label>
                                <select id="input_5350_order-by" class="form-control   " name="order_by">
                                    <option selected="selected" value="Id">Id</option>
                                    <option value="name">Название</option>
                                    <option onchange="this.submit()" value="ordering">Порядок</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="row align-items-end">

                                <div class="col-auto">
                                    <div class="form-group ">
                                        <label for="basic-url">Поиск&nbsp;</label>
                                        <div class="input-group">
                                            <input class="form-control  " name="search" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href=""
                                       class="btn btn-outline-secondary mb-3">

                                        <!-- <i class="fas fa-redo" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                        Сбросить
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-auto pb-3">
                <a href="{{route('crm.news.create')}}" class="btn btn-outline-success">
                    Добавить новость

                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-1">
                №
            </div>
            <div class="col-4">
                Название
            </div>
            <div class="col-2">
                Аватар
            </div>
            <div class="col-1 text-center">
                Описание
            </div>
            <div class="col-1 text-center">
                Публикация
            </div>

            <div class="col pr-5 text-right">
                Действия
            </div>
        </div>
        @forelse($news as $newsItem)

            <div class="border-bottom mb-1">
                <div class="row py-1" style="background-color: #c1f0c1">
                    <div class="col-1">
                        {{$newsItem->getKey()}}
                    </div>
                    <div class="col-4">
                        {{$newsItem->getName()}}
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12 small text-secondary">
                                <img
                                    src="{{$newsItem->getImageUrl()}}" class="img-thumbnail" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 text-center">
                        {!! $newsItem->getDescription()!!}
                    </div>
                    <div class="col-1 text-center">

                        {{Form::model($newsItem, ['url' =>route ('crm.news.published', $newsItem), 'method' => 'get' ])}}
                        <button>
                            {!! $newsItem->isPublishing()? 'Скрыть':'Показать'!!}
                        </button>
                        {{Form::close()}}

                        {{$newsItem->isPublishing()}}
                    </div>
                    <div class="col float-right text-right">

                        {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$newsItem)])}}
                        <button class="btn btn-danger rounded-pill px-3">
                            delete
                        </button>
                        {{Form::close()}}

                        <a href="{{route('crm.news.edit',$newsItem)}}" class="btn btn-success">

                            Редактировать
                        </a>

                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div>






    {{--        @forelse($news as $news_items)--}}
    {{--            <div class="card" style="margin-bottom: 2rem;">--}}
    {{--                <div class="page-simple__h1" style="text-align: start;">--}}
    {{--                    {{$news_items->getName()}}--}}
    {{--                </div>--}}
    {{--                <hr style="border: none; background-color: #474747; color: #474747; height: 1px; width: 100%">--}}
    {{--                <div class="page-simple__content" style="text-align: start;">--}}
    {{--                    <div>--}}
    {{--                        <figure--}}
    {{--                            data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;img061.pdf&quot;,&quot;filesize&quot;:147368,&quot;href&quot;:&quot;https://gastrolint.ru/storage/qopX3flxAd2e1rFpZ7gBXZtdByJ1NhOc8461DdZI.pdf&quot;,&quot;url&quot;:&quot;https://gastrolint.ru/storage/qopX3flxAd2e1rFpZ7gBXZtdByJ1NhOc8461DdZI.pdf&quot;}"--}}
    {{--                            data-trix-content-type="application/pdf"--}}
    {{--                            class="attachment attachment--file attachment--pdf"><img--}}
    {{--                                src="{{$news_items->getImageUrl()}}" class="img-thumbnail" alt="..."></figure>--}}
    {{--                        {!! $news_items->getDiscription()!!}--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div>--}}
    {{--                    {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$news_items)])}}--}}
    {{--                    <button class="btn btn-danger rounded-pill px-3">--}}
    {{--                        delete--}}
    {{--                    </button>--}}
    {{--                    {{Form::close()}}--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        @empty--}}
    {{--        @endforelse--}}




    {{--        @forelse($news as $news_items)--}}
    {{--            <tr>--}}
    {{--                <th scope="col"><img src="{{$news_items->getImageUrl()}}" class="img-thumbnail" alt="..."></th>--}}
    {{--                <th scope="col">{{$news_items->getName()}}</th>--}}
    {{--                <th scope="col">{{$news_items->getImageUrl()}}</th>--}}
    {{--                <th scope="col">{!! $news_items->getDiscription() !!}</th>--}}
    {{--                <th scope="col">--}}
    {{--                    {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$news_items)])}}--}}
    {{--                    <button class="btn btn-danger rounded-pill px-3">--}}
    {{--                        delete--}}
    {{--                    </button>--}}
    {{--                    {{Form::close()}}--}}
    {{--                </th>--}}
    {{--            </tr>--}}

@endsection

