@csrf
<div class="row">
  @php
      $input = 'name';
  @endphp
  <div class="col-md-6 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating"> Username</label>
      <input type="text"  name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>
  @php
  $input = 'password';
@endphp
  <div class="col-md-6 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Password</label>
      <input type="password" name="{{$input}}"  class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>
   @php
    $input = 'group';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">User Role</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                <option value="admin" {{ isset($user) && $user->{$input} == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="user" {{ isset($user) && $user->{$input} == 'user' ? 'selected' : '' }}>user</option>
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

  @php
  $input = 'email';
@endphp
  <div class="col-md-6 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email address</label>
      <input type="email"  name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>
</div>