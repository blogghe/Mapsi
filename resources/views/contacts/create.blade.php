@extends('layout')

@section('title')
    Add new contact
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add new contact</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/contacts" method="POST" class="pb-5">
                <div class="form-group">
                    <label for="name">Name:
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('name')}}</div>
                </div>
                <div class="form-group">
                    <label for="email">Email:
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('email')}}</div>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate:
                        <input type="date" name="birthdate" value="{{old('birthdate')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('birthdate')}}</div>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:
                        <select class="form-control m-bot15" name="gender">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                            <option value="2">Other</option>
                        </select>
                    </label>
                    <div>{{$errors->first('role_id')}}</div>
                </div>
                <div class="form-group">
                    <label for="street">Street:
                        <input type="text" name="street" value="{{old('street')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('street')}}</div>
                </div>
                <div class="form-group">
                    <label for="sNumber">Number:
                        <input type="text" name="sNumber" value="{{old('sNumber')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('sNumber')}}</div>
                </div>
                <div class="form-group">
                    <label for="bus">Bus:
                        <input type="text" name="bus" value="{{old('bus')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('bus')}}</div>
                </div>
                <div class="form-group">
                    <label for="city">City:
                        <input type="text" name="city" value="{{old('city')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('city')}}</div>
                </div>
                <div class="form-group">
                    <label for="zip">Zip:
                        <input type="text" name="zip" value="{{old('zip')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('zip')}}</div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                    </label>
                    <div>{{$errors->first('phone')}}</div>
                </div>
                <button type="submit" class="btn btn-primary">Add contact</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
