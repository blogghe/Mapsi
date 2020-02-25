<div class="form-group">
    <label for="name">{{__('text.name')}}:
        <input type="text" name="name" value="{{old('name') ?? $service->name}}" class="form-control">
    </label>
    <div>{{$errors->first('name')}}</div>
</div>
<div class="form-group">
    <label for="email">{{__('text.email')}}:
        <input type="text" name="email" value="{{old('email') ?? $service->email}}" class="form-control">
    </label>
    <div>{{$errors->first('email')}}</div>
</div>
@csrf
