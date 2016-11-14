{{ csrf_field() }}
<div class="row">
    <div class="form-group col-md-3">
        <label for="clientName">Client Name</label>
        <input type="text" name="clientName" id="clientName" class="form-control"
               value="{{ old('clientName') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="clientIndustry">Client Industry</label>
        <input type="text" name="clientIndustry" id="clientIndustry" class="form-control"
               value="{{ old('clientIndustry') }}">
    </div>
    <div class="form-group col-md-3">
        <label for="campaignName">Campaign Name</label>
        <input type="text" name="campaignName" id="campaignName" class="form-control"
               value="{{ old('campaignName') }}">
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-md-9">
        <label for="basicDescription">Basic Description</label>
        <textarea type="text" name="basicDescription" id="basicDescription"
                  class="form-control" value="{{ old('basicDescription') }}"
                  rows="5">
                        </textarea>
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-md-3">
        <label for="flightDateStart">Flight Date Start</label>
        <input class="form-control" type="date"
               value="{{ date('Y-m-d') }}" name="flightDateStart" id="flightDateStart">
    </div>
    <div class="form-group col-md-3">
        <label for="flightDateEnd">Flight Date End</label>
        <input class="form-control" type="date"
               value="{{ date('Y-m-d') }}" name="flightDateEnd" id="flightDateEnd">
    </div>
    <div class="form-group col-md-3">
        <label for="staggered">Staggered?</label>
        <select name="staggered" id="staggered" class="form-control">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="budget">Budget</label>
        <input type="text" name="budget" id="budget" class="form-control" value="{{ old('budget') }}">
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit Request &gt;</button>
</div>
