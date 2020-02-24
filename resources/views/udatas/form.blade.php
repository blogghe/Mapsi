<div class="form-group">
    <label for="description">Phone:
        <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $user->udata->phone}}">
    </label>
    <div>{{$errors->first('phone')}}</div>
</div>
<div class="form-group">
    <label for="status">Language:
        <select class="form-control m-bot15" name="language">
            <option value="" disabled>Select a language</option>
            @foreach( $user->udata->languageOptions() as $languageOptionKey => $languageOptionValue)
                <option value="{{$languageOptionKey}}" {{$user->udata->language==$languageOptionValue ? 'selected':''}}>
                    {{$languageOptionValue}}
                </option>
            @endforeach
        </select>
    </label>
</div>
<div class="form-group">
    <label for="status">Selfmail:
        <select class="form-control m-bot15" name="selfmail">
            <option value="" disabled>yes/no</option>
            @foreach( $user->udata->selfmailOptions() as $selfmailOptionsKey => $selfmailOptionsValue)
                <option value="{{$selfmailOptionsKey}}" {{$user->udata->selfmail==$selfmailOptionsValue ? 'selected':''}}>
                    {{$selfmailOptionsValue}}
                </option>
            @endforeach
        </select>
    </label>
</div>
@csrf
