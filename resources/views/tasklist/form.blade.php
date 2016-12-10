{{ csrf_field() }}
<div class="row">
    <div class="form-group col-md-3">
        <label for="name">Task List Name</label>
        <input type="text" name="name" id="name" class="form-control"
               value="{{ old('name') }}">
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Create Task List</button>
</div>
