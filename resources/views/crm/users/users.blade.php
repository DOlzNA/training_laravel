@extends('crm.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        {{--                    <a href="{{route('users.create')}}" class="btn btn-success">--}}
                        {{--                        --}}
                        {{--                    </a>--}}

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-3">
                    №
                </div>
                <div class="col-4">
                    Пользователь
                </div>
                <div class="col-1 text-right">
                    Действия
                </div>
            </div>



            @forelse($users as $user)
                <div class="row pb-3">
                    <div class="col-3">
                        {{$user->getKey()}}
                    </div>
                    <div class="col-4">
                        {{$user->getName()}}
                    </div>
                    <div class="col-5">
                        <a href="{{route('crm.users.edit',$user)}}" class="btn btn-success">

                            Редактировать
                        </a>
                        {{Form::open(['method'=>"DELETE", "url"=>route('crm.news.destroy',$user)])}}
                        <button class="btn btn-danger rounded-pill px-3">
                            delete
                        </button>
                        {{Form::close()}}
                    </div>
                    <hr>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection

