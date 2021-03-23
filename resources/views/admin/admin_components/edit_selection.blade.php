<div class="form-group">
    <label for="{{ $select_id }}">{{ $labelText }}</label>
    <select class="form-control" id="{{ $select_id }}" name="{{ $name }}">
        <option disabled {{ (old("$name") == null ? "selected":"") }}></option>
        @if($sources == null)
            @foreach($lists as $list)
                <option value="{{ $list }}" {{ (old("$name") == null ? $order->$name == $list ? "selected":"" : old("$name") == $list ? "selected":"") }}>{{ $list }}</option>
            @endforeach
            @else
        @foreach($sources as $source)
            <option value="{{ $source->id }}" {{ (old("$name") == null ? $order->source_id == $source->id ? "selected":"" : old("$name") == $source->id ? "selected":"") }}>{{ $source->name }}</option>
        @endforeach
        @endif
    </select>
    {!! $errors->first("$name", '<p class="text-danger">:message</p>') !!}
</div>
