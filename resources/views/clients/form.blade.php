{{ csrf_field() }}
<div class="row">
    <div class="form-group col-md-3">
        <label for="name">Client Name</label>
        <input type="text" name="name" id="name" class="form-control"
               value="{{ old('name') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="industry">Client Industry</label>
        <input type="text" name="industry" id="industry" class="form-control"
               value="{{ old('industry') }}">
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Create Client &gt;</button>
</div>
