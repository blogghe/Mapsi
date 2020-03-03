@extends('layouts.app')

@section('title')
    Add new Problem
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{__('text.add new problem')}}</h1>
        </div>
    </div>
    <div class="row">
        @if(!$services->isEmpty())
            <div class="col-12">
                <form action="{{route('problems.store')}}" method="POST" class="pb-5">
                    @include('problems.form')
                    <div class="form-group">
                        <a href="#contact_info" data-toggle="collapse">Collapsible</a>
                    </div>
                    <div class="form-group">
                        <label for="contact_id2">{{__('text.contact')}}:
                            <select class="form-control m-bot15" name="contact_id2" id="contact_id2">
                                <option value="" disabled>{{__('text.select a contact')}}</option>
                                <option value="1"><a href="#contact_info" data-toggle="collapse">Collapsible</a></option>
                                <option value="1">brol</option>
                                <option value="1">brol</option>
                                <option value="1">brol</option>

                            </select>
                        </label>
                        <div>{{$errors->first('contact_id')}}</div>
                    </div>
                    @include('contacts.basic')


                    <button type="submit" class="btn btn-primary">{{__('text.add new problem')}}</button>
                </form>
            </div>
        @else
            <div class="col-12">
                <p>{{__('text.no services found')}}, <a
                        href="/services/create">{{__('text.create')}}</a>{{__('text.a service first')}}</p>
            </div>
        @endif
    </div>
@endsection
