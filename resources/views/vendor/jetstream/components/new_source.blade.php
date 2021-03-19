
<div class="container-fluid">

<div class="row justify-content-center" >

    <div class="col-md-8">
    <form method="POST" action="{{ url('sources') }}">
        @csrf
        <div class="form-group">
            <label for="source-name-label">Name of the source</label>
            <input type="text" class="form-control {{($errors->first('name') ? "form-error" : "")}}" name="name" placeholder="Name of the source" value="{{ old('name') }}"/>
            {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}

        </div>
        <div class="form-group">
            <label for="desc">Brief source description</label>
            <textarea class="form-control {{($errors->first('description') ? "form-error" : "")}}" id="desc" rows="3" name="description"  placeholder="Briefly describe the source" >{{ old('description') }}</textarea>
            {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>


</div>

