<div class="form-group">
    <label for="description">{{__('text.phone')}}:
        <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $user->udata->phone}}">
    </label>
    <div>{{$errors->first('phone')}}</div>
</div>
<div class="form-group">
    <label for="status">{{__('text.language')}}:
        <select class="form-control m-bot15" name="language">
            <option value="" disabled>{{__('text.select a language')}}</option>
            @foreach( $user->udata->languageOptions() as $languageOptionKey => $languageOptionValue)
                <option value="{{$languageOptionKey}}" {{$user->udata->language==$languageOptionValue ? 'selected':''}}>
                    {{$languageOptionValue}}
                </option>
            @endforeach
        </select>
    </label>
</div>
<div class="form-group">
    <label for="status">{{__('text.self mail')}}:
        <select class="form-control m-bot15" name="selfmail">
            <option value="" disabled>{{__('text.yes')}}/{{__('text.no')}}</option>
            @foreach( $user->udata->selfmailOptions() as $selfmailOptionsKey => $selfmailOptionsValue)
                <option value="{{$selfmailOptionsKey}}" {{$user->udata->selfmail==$selfmailOptionsValue ? 'selected':''}}>
                    {{$selfmailOptionsValue}}
                </option>
            @endforeach
        </select>
    </label>
</div>
@csrf
