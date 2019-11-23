@extends('layouts.app')
@push('css')
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Job Details') }}</div>

                <div class="card-body">
                    <p><strong>Job Title: &nbsp;</strong>{{$TotalPost->job_title}}</p>
                    <p><strong>Job Responsibilty: &nbsp;</strong>{!!$TotalPost->job_description!!}</p>
                    <p><strong>Salary: &nbsp;</strong>{{$TotalPost->salary}}TK</p>
                    <p><strong>Location: &nbsp;</strong>{{$TotalPost->location}}</p>
                    <p><strong>Country: &nbsp;</strong>{{$TotalPost->country}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Short info') }}</div>
                <div class="card-body">
                    <p><strong>Company Name: &nbsp;</strong>{{$TotalPost->employer->business_name}}</p>
                    <p><strong>Company Name: &nbsp;</strong>{{$TotalPost->employer->email}}</p>
                </div>
            </div>
            &nbsp;
            @guest
            <p>To Apply this job, You have to Login first</p>
            @else
            <a href="" class="btn btn-success">Apply</a>
            @endguest
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush