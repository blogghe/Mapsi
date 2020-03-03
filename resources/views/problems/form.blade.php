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
    <div>{{$errors->first('description')}}</div>
</div>
<div class="form-group">
    <label for="label_id">{{__('text.label')}}:
        <select class="form-control m-bot15" name="label_id" id="label_id">
            <option value="" disabled>{{__('text.select a label')}}</option>
            <option value="0">None</option>
            @foreach($labels as $label)
                <option value="{{$label->id}}" @if(!$problem['labels']->isEmpty())
                    {{$label->id == $problem->labels->first()->id ? 'selected': ''}}
                    @endif>
                    {{$label->name}}
                </option>
            @endforeach
        </select>
    </label>
    <div>{{$errors->first('label_id')}}</div>
</div>
<div class="form-group">
    <label for="service_id">{{__('text.service')}}:
        <select class="form-control m-bot15" name="service_id" id="service_id">
            <option value="" disabled>{{__('text.select a service')}}</option>
            @foreach($services as $service)
                <option value="{{$service->id}}" @isset($problem['service_id'])
                    {{$service->id == $problem->service->id ? 'selected': ''}}
                    @endisset>
                    {{$service->name}}
                </option>
            @endforeach
        </select>
    </label>
    <div>{{$errors->first('service_id')}}</div>
</div>
<div class="form-group">
    <label for="contact_id">{{__('text.contact')}}:
        <select class="form-control m-bot15" name="contact_id" id="contact_id">
            <option value="" disabled>{{__('text.select a contact')}}</option>
            @foreach($contacts as $contact)
                <option value="{{$contact->id}}" @isset($problem['contact_id'])
                    {{$contact->id == $problem->contact->id ? 'selected': ''}}
                    @endisset>
                    {{$contact->name}}
                </option>
            @endforeach
        </select>
    </label>
    <div>{{$errors->first('contact_id')}}</div>
</div>
@csrf
