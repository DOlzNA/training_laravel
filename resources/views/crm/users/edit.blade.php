@extends('crm.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="row justify-content-end">
                    <div class="col-auto">

                        {{Form::model($user,['url'=>route('crm.users.update',$user),'method'=>'POST'])}}

                        @include('crm._forms',$user)
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
