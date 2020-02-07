@extends('layout')

@section('content')
    <h1>list contact</h1>

    <form action="listContacts" method="POST" class="pb-5">
        <div class="input-group">
            <label>Name:
                <input type="text" name="name" value="{{old('name')}}">
            </label>
            <div>{{$errors->first('name')}}</div>
        </div>
        <div class="input-group">
            <label>Email:
                <input type="text" name="email" value="{{old('email')}}">
            </label>
            <div>{{$errors->first('email')}}</div>
        </div>
        <div class="input-group">
            <label>Birthdate:
                <input type="date" name="birthdate" value="{{old('birthdate')}}">
            </label>
            <div>{{$errors->first('birthdate')}}</div>
        </div>
        <div class="input-group">
            <label>Gender:
                <select class="form-control m-bot15" name="role_id">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    <option value="2">Other</option>
                </select>
            </label>
            <div>{{$errors->first('role_id')}}</div>
        </div>
        <div class="input-group">
            <label>Street:
                <input type="text" name="street" value="{{old('street')}}">
            </label>
            <div>{{$errors->first('street')}}</div>
        </div>
        <div class="input-group">
            <label>Number:
                <input type="text" name="sNumber" value="{{old('sNumber')}}">
            </label>
            <div>{{$errors->first('sNumber')}}</div>
        </div>
        <div class="input-group">
            <label>Bus:
                <input type="text" name="bus" value="{{old('bus')}}">
            </label>
            <div>{{$errors->first('bus')}}</div>
        </div>
        <div class="input-group">
            <label>City:
                <input type="text" name="city" value="{{old('city')}}">
            </label>
            <div>{{$errors->first('city')}}</div>
        </div>
        <div class="input-group">
            <label>Zip:
                <input type="text" name="zip" value="{{old('zip')}}">
            </label>
            <div>{{$errors->first('zip')}}</div>
        </div>
        <div class="input-group">
            <label>Phone:
                <input type="text" name="phone" value="{{old('phone')}}">
            </label>
            <div>{{$errors->first('phone')}}</div>
        </div>

        <button type="submit">Add contact</button>
        @csrf
    </form>

    @if( ! empty($contacts))
        List contacts
        <ul>
            @foreach($contacts as $contact)
                <li>{{$contact->name}}<span class="text-muted"> ({{$contact->email}})</span></li>
            <!--<li>{{$contact}}</li>-->
            @endforeach
        </ul>
    @else
        No contacts created yet
    @endif
@endsection