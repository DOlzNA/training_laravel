<div class="center">
    <label class="form-label">{{$label}}</label>
    {{--        @trix(\App\News::class, 'content')--}}

    @if($type != 'trix')
        <input name="{{$name}}" type="{{$type ?? 'string'}}" value="{{$value}}" class="form-control "
               aria-label="" aria-describedby="basic-addon1">
    @else
        <input id="x" type="hidden" name="discription" value="" />
        <trix-editor input="x" class="trix-content"></trix-editor>
    @endif
</div>


