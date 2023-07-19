@extends('site.layouts.app')
@section('content')
    <div class="main">
        <div class="container">
            <div class="page-simple">
                @forelse($news as $newsItem)
                    @if($newsItem->isPublished())


                    <div class="card" style="margin-bottom: 2rem;">
                        <div class="page-simple__h1" style="text-align: start;">
                            {{$newsItem->getName()}}
                        </div>
                        <hr style="border: none; background-color: #474747; color: #474747; height: 1px; width: 100%">
                        <div class="page-simple__content" style="text-align: start;">
                            <div>
                                <figure
                                    data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;img061.pdf&quot;,&quot;filesize&quot;:147368,&quot;href&quot;:&quot;https://gastrolint.ru/storage/qopX3flxAd2e1rFpZ7gBXZtdByJ1NhOc8461DdZI.pdf&quot;,&quot;url&quot;:&quot;https://gastrolint.ru/storage/qopX3flxAd2e1rFpZ7gBXZtdByJ1NhOc8461DdZI.pdf&quot;}"
                                    data-trix-content-type="application/pdf"
                                    class="attachment attachment--file attachment--pdf"><img
                                        src="{{$newsItem->getImageUrl()}}" class="img-thumbnail" alt="..."></figure>
                                {!! $newsItem->getDescription()!!}
                            </div>
                        </div>
                    </div>
                    @endif



                    {{--                <tr>--}}
                    {{--                    <th scope="col"><img src="{{$news_items->getImageUrl()}}" class="img-thumbnail" alt="..."></th>--}}
                    {{--                    <th scope="col"></th>--}}
                    {{--                    <th scope="col">{{$news_items->getImageUrl()}}</th>--}}
                    {{--                    <th scope="col">{{$news_items->getDiscription()}}</th>--}}
                    {{--                    --}}{{--                <th scope="col">--}}
                    {{--                    --}}{{--                    {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$news_items)])}}--}}
                    {{--                    --}}{{--                    <button class="btn btn-danger rounded-pill px-3">--}}
                    {{--                    --}}{{--                        delete--}}
                    {{--                    --}}{{--                    </button>--}}
                    {{--                    --}}{{--                    {{Form::close()}}--}}
                    {{--                    --}}{{--                </th>--}}
                    {{--                </tr>--}}

                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection

