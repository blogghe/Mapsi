<div class="form-group">
    <label for="title">{{__('text.title')}}:
        <input type="text" name="title" value="{{old('title') ?? $problem->title}}" class="form-control">
    </label>
    <div>{{$errors->first('title')}}</div>
</div>
<div class="form-group">
    <label for="description">{{__('text.description')}}:
        <textarea class="form-control" name="description">{{old('description') ?? $problem->description}}</textarea>
    </label>
    <div>{{$errors->first('description')}}</div>
</div>
<div class="form-group">
    <label for="status">{{__('text.status')}}:
        <select class="form-control m-bot15" name="status">
            <option value="" disabled>{{__('text.select a status')}}</option>
            @foreach($problem->statusOptions() as $statusOptionsKey => $statusOptionValue)
                <option value="{{$statusOptionsKey}}" {{$problem->status==$statusOptionValue ? 'selected':''}}>
                    {{$statusOptionValue}}
                </option>
            @endforeach
        </select>
    </label>
</div>
<div class="form-group">
    <label for="service_id">{{__('text.service')}}:
        <select class="form-control m-bot15" name="service_id" id="service_id">
            <option value="" disabled>Select a service</option>
            @foreach($services as $service)
                <option value="{{$service->id}}"{{$service->id == $problem->service->id ? 'selected': ''}}>
                    {{$service->name}}
                </option>
            @endforeach
        </select>
    </label>
</div>
@csrf
