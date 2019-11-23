@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('editor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<style type="text/css">
    .user-image{
        padding: 10px;
        box-shadow: 5px 2px white;
        margin-bottom: 5px;
        background: white;
        height: 200px;
    }
    .imageposition{
        height: 150px;
        width: 150px;
        /* padding: 20px; */
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        border-radius: 100px;
    }
    .saveprofile{
        margin-top: 20px;
    }
    .userinfo{
        margin-left: 50px;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Applicant Info') }}</div>

                <div class="card-body">
                    <div class="user-image">
                       <img src="{{url('storage/avatars/'.$userInfo->avatar)}}" alt="" class="imageposition">
                    </div>
                    @php
                      $fname = Auth::user()->first_name;
                      $lname = Auth::user()->last_name;
                      $username = $fname.$lname;
                    @endphp
                    <p class="userinfo"><strong>Name:&nbsp;</strong>{{$username}}</p>
                    <p class="userinfo"><strong>Skills:&nbsp;</strong>{{$userInfo->skill}}</p>
                    <p class="userinfo"><strong>Skills:&nbsp;</strong>{{$userInfo->gender}}</p>
                    <p class="userinfo"><strong>Skills:&nbsp;</strong>{{$userInfo->phone}}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Applicant Resume') }}</div>

                <div class="card-body">
                    <div class="user-image">
                       <embed src="{{url('resumes/'.$userInfo->resume)}}" type="application/pdf" width="100%" height="100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @include('messages/flash-messages')
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>
                <form action="{{route('user-profile.store')}}" class="saveprofile" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea name="bio" class="wysihtml5-toolbar" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Skill') }}</label>

                            <div class="col-md-6">
                                <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('bio') }}" required autocomplete="skill" autofocus>

                                @error('skill')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control">
                                    <option selected>--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('bio') }}" required autocomplete="experience" autofocus>

                                @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>
                            <div class="col-md-6">
                                <input id="resume" type="file" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}">

                                @error('resume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}">

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-8">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('editor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('.wysihtml5-toolbar').wysihtml5(
        {
         toolbar: {
            fa: true
        }
    })
})
</script>
@endpush