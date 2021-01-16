@csrf
<div class="row p-2">
  @php
      $input = 'name';
  @endphp
  <div class="col-md-4 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating"> Category Name</label>
      <input type="text"  name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
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
  <div class="col-md-4 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email</label>
      <input type="text" name="{{$input}}" value="{{ isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
      @error($input)
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>
  </div>


  @php
    $input = 'message';
  @endphp
  <div class="col-md-12 mt-3">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Message</label>
      <textarea name="{{$input}}"cols="30" rows="10"  class="form-control @error($input) is-invalid @enderror">{{ isset($user) ? $user->{$input} : ''}}</textarea>
      
      @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
</div>

<hr>

<h4>Replay on Message</h4>
<br>

@php
$input = 'message';
@endphp
<div class="col-md-12 mt-3">
<div class="form-group bmd-form-group">
  <form action="{{route('message.replay' , ['id' => $user->id]) }}" method="post">
    @csrf
        <label class="bmd-label-floating">Replay Message</label>
      <textarea name="{{$input}}"cols="30" rows="10"  class="form-control @error($input) is-invalid @enderror"></textarea>
      
      @error($input)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      <button type="submit" class="btn btn-primary pull-right">Replay Message</button>
            <div class="clearfix"></div>
  </form>
  
</div>
</div>
</div>