@csrf
<div class="row p-2">
    @php
    $input = 'name';
    @endphp
    <div class="col-md-4 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating"> Video Name</label>
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
    $input = 'desc';
    @endphp
    <div class="col-md-4 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Description</label>
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
    $input = 'meta_keywords';
    @endphp
    <div class="col-md-4 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keywords</label>
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
    $input = 'youtube';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube Url</label>
            <input type="url" name="{{ $input }}" value="{{ isset($user) ? $user->{$input} : '' }}"
                class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
    $input = 'published';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{ isset($user) && $user->{$input} == 1 ? 'selected' : '' }}>Published</option>
                <option value="0" {{ isset($user) && $user->{$input} == 0 ? 'selected' : '' }}>Hidden</option>
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php
    $input = 'cat_id';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ isset($user) && $user->{$input} == $category->id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php
    $input = 'skills[]';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}" {{ in_array($skill->id , $selectedSkills) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
    $input = 'image';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="">
            <label>Video Image</label>
            <input type="file" name="{{ $input }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
    $input = 'tags[]';
    @endphp
    <div class="col-md-6 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"  {{ in_array($tag->id , $selectedTags) ? 'selected' : ''}}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php
    $input = 'meta_desc';
    @endphp
    <div class="col-md-12 mt-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Desc</label>
            <textarea name="{{ $input }}" cols="30" rows="10"
                class="form-control @error($input) is-invalid @enderror">{{ isset($user) ? $user->{$input} : '' }}</textarea>

            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


</div>
