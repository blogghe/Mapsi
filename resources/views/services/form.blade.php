<div class="form-group">
    <label for="name">Name:
        <input type="text" name="name" value="{{old('name') ?? $service->name}}" class="form-control">
    </label>
    <div>{{$errors->first('name')}}</div>
</div>
<div class="form-group">
    <label for="email">Email:
        <input type="text" name="email" value="{{old('email') ?? $service->email}}" class="form-control">
    </label>
    <div>{{$errors->first('email')}}</div>
</div>
@csrf
