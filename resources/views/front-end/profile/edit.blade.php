<div class="card text-left" id="editProfile" style="display: none">
    <div class="card-header">
       <h5>Update Profile</h5> 
    </div>
    <div class="card-body">
        <form action="{{route('profile.update')}}" method="post">
            <div class="row">
            
                    @csrf
                @php
                $input = 'name';
                @endphp
                <div class="col-md-6 mt-3">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating"> Username</label>
                        <input type="text" name="{{ $input }}" value="{{ isset($user) ? $user->{$input} : '' }}"
                            class="form-control @error($input) is-invalid @enderror">
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
                        <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
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
                        <input type="email" name="{{ $input }}" value="{{ isset($user) ? $user->{$input} : '' }}"
                            class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 text-left mt-5"  >
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                        <div class="clearfix"></div>
                </div>
                
            </div>
            </form>
    </div>
  </div>

    