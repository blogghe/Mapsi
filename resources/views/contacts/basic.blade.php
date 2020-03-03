<div id="contact_info" class="collapse">
    <div class="form-group">
        <label for="name">{{__('text.name')}}:
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
        </label>
        <div>{{$errors->first('name')}}</div>
    </div>
    <div class="form-group">
        <label for="email">{{__('text.email')}}:
            <input type="text" name="email" value="{{old('email')}}" class="form-control">
        </label>
        <div>{{$errors->first('email')}}</div>
    </div>
    <div class="form-group">
        <label for="birthdate">{{__('text.birthdate')}}:
            <input type="date" data-date-format="dd/mm/yyyy" name="birthdate"
                   value="{{old('birthdate')}}" class="form-control">
        </label>
        <div>{{$errors->first('birthdate')}}</div>
    </div>
</div>
