@extends('crm.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-end">
                    <div class="col-auto">

                        {{Form::model($news,['url'=>route('crm.news.update',$news),'method'=>'POST',"enctype"=>"multipart/form-data"])}}

                        @include('forms.news-form',$news)
                        <button class="btn btn-primary rounded-pill px-3">
                            Сохранить
                        </button>
                        {{Form::close()}}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
