@csrf
<div class="row p-2">
  @php
      $input = 'name';
  @endphp
  <div class="col-md-4 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating"> Page Name</label>
      <input type="text"  name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>
  @php
  $input = 'desc';
@endphp
  <div class="col-md-4 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Description</label>
      <input type="text" name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>
  @php
  $input = 'meta_keywords';
@endphp
  <div class="col-md-4 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Meta Keywords</label>
      <input type="text" name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>

  @php
    $input = 'meta_descs';
  @endphp
  <div class="col-md-12 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Meta Description</label>
      <textarea name="{{$input}}"cols="30" rows="10"  class="form-control @error($input) is-invalid @enderror">{{ isset($user) ? $user->{$input} : ''}}</textarea>
      
      @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
</div>