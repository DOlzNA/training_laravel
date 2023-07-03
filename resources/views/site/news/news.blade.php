@extends('site.layouts.app')
@section('content')

    <div class="container">
        @forelse($news as $news_items)
            <tr>
                <th scope="col"><img src="{{$news_items->getImageUrl()}}" class="img-thumbnail" alt="..."></th>
                <th scope="col">{{$news_items->getName()}}</th>
                <th scope="col">{{$news_items->getImageUrl()}}</th>
                <th scope="col">{{$news_items->getDiscription()}}</th>
{{--                <th scope="col">--}}
{{--                    {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$news_items)])}}--}}
{{--                    <button class="btn btn-danger rounded-pill px-3">--}}
{{--                        delete--}}
{{--                    </button>--}}
{{--                    {{Form::close()}}--}}
{{--                </th>--}}
            </tr>

        @empty
        @endforelse
    </div>
@endsection

