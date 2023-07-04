@extends('crm.layouts.app')
@section('content')

    <div class="container">
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

            <div class="col pr-5 text-right">
                Действия
            </div>
        </div>
        @forelse($news as $news_items)

            <div class="border-bottom mb-1">
                <div class="row py-1" style="background-color: #c1f0c1">
                    <div class="col-1">
                        {{$news_items->getKey()}}
                    </div>
                    <div class="col-4">
                        {{$news_items->getName()}}
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col-12 small text-secondary">
                                <img
                                    src="{{$news_items->getImageUrl()}}" class="img-thumbnail" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 text-center">
                        {!! $news_items->getDiscription()!!}
                    </div>
                    <div class="col float-right text-right">

                        {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$news_items)])}}
                        <button class="btn btn-danger rounded-pill px-3">
                            delete
                        </button>
                        {{Form::close()}}

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

