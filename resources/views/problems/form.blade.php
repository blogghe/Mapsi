<div class="form-group">
    <label for="title">Title:
        <input type="text" name="title" value="{{old('title') ?? $problem->title}}" class="form-control">
    </label>
    <div>{{$errors->first('title')}}</div>
</div>
<div class="form-group">
    <label for="description">Description:
        <textarea class="form-control" name="description">{{old('description') ?? $problem->description}}</textarea>
    </label>
    <div>{{$errors->first('description')}}</div>
</div>
<div class="form-group">
    <label for="status">Status:
        <select class="form-control m-bot15" name="status">
            <option value="" disabled>Select a status</option>
            @foreach($problem->statusOptions() as $statusOptionsKey => $statusOptionValue)
                <option value="{{$statusOptionsKey}}" {{$problem->status==$statusOptionValue ? 'selected':''}}>
                    {{$statusOptionValue}}
                </option>
            @endforeach
        </select>
    </label>
</div>
<div class="form-group">
    <label for="service_id">Service:
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
