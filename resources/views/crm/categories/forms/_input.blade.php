<div class="center">
    <label class="form-label">{{$label}}</label>
    {{--        @trix(\App\News::class, 'content')--}}

{{--    @if($type != 'select')--}}
        <input name="{{$name}}" type="{{$type ?? 'string'}}" value="{{$value}}" class="form-control "
               aria-label="" aria-describedby="basic-addon1">
{{--    @else--}}
{{--        <label>--}}
{{--            <select size="3" name="{{$name}}">--}}
{{--                <option>123</option>--}}
{{--                <option>123</option>--}}
{{--            </select>--}}
{{--        </label>--}}

{{--    @endif--}}
</div>


