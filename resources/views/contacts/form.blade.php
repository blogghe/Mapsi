<div class="form-group">
    <label for="name">{{__('text.name')}}:
        <input type="text" name="name" value="{{old('name') ?? $contact->name}}" class="form-control">
    </label>
    <div>{{$errors->first('name')}}</div>
</div>
<div class="form-group">
    <label for="email">{{__('text.email')}}:
        <input type="text" name="email" value="{{old('email') ?? $contact->email}}" class="form-control">
    </label>
    <div>{{$errors->first('email')}}</div>
</div>
<div class="form-group">
    <label for="birthdate">{{__('text.birthdate')}}:
        <input type="date"  data-date-format="dd/mm/yyyy" name="birthdate" value="{{old('birthdate') ?? $contact->birthdate}}" class="form-control">
    </label>
    <div>{{$errors->first('birthdate')}}</div>
</div>
<div class="form-group">
    <label for="gender">{{__('text.gender')}}:
        <select class="form-control m-bot15" name="gender">
            @foreach($contact->genderOptions() as $genderOptionsKey => $genderOptionsValue)
                <option value="{{$genderOptionsKey}}" {{$contact->gender==$genderOptionsValue ? 'selected': ''}}>
                    {{$genderOptionsValue}}
                </option>
            @endforeach
        </select>
    </label>
    <div>{{$errors->first('role_id')}}</div>
</div>
<div class="form-group">
    <label for="street">{{__('text.street')}}:
        <input type="text" name="street" value="{{old('street') ?? $contact->street}}" class="form-control">
    </label>
    <div>{{$errors->first('street')}}</div>
</div>
<div class="form-group">
    <label for="sNumber">{{__('text.nr')}}:
        <input type="text" name="sNumber" value="{{old('sNumber') ?? $contact->sNumber}}" class="form-control">
    </label>
    <div>{{$errors->first('sNumber')}}</div>
</div>
<div class="form-group">
    <label for="bus">{{__('text.bus')}}:
        <input type="text" name="bus" value="{{old('bus') ?? $contact->bus}}" class="form-control">
    </label>
    <div>{{$errors->first('bus')}}</div>
</div>
<div class="form-group">
    <label for="city">{{__('text.city')}}:
        <input type="text" name="city" value="{{old('city') ?? $contact->city}}" class="form-control">
    </label>
    <div>{{$errors->first('city')}}</div>
</div>
<div class="form-group">
    <label for="zip">{{__('text.zip')}}:
        <input type="text" name="zip" value="{{old('zip') ?? $contact->zip}}" class="form-control">
    </label>
    <div>{{$errors->first('zip')}}</div>
</div>
<div class="form-group">
    <label for="phone">{{__('text.phone 1')}}:
        <input type="text" name="phone" value="{{old('phone') ?? $contact->phone}}" class="form-control">
    </label>
    <div>{{$errors->first('phone')}}</div>
</div>

<div class="form-group d-flex flex-column">
    <label for="image">{{__('text.contact image')}}</label>
    <input type="file" name="image" class="py-2">
    <div>{{$errors->first('image')}}</div>
</div>
@csrf
