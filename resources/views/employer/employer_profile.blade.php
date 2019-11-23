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
                   <p><strong>Company Name: &nbsp;</strong>{{$CompanyInfo->business_name}}</p> 
                   <p><strong>Company Email: &nbsp;</strong>{{$CompanyInfo->email}}</p> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @include('messages/flash-messages')
            <div class="card">
                <div class="card-header">{{ __('Job Post') }}</div>
                <div class="card-body">
                    <div class="jobcart">
                        <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Sl No.</th>
                      <th scope="col">Company Name</th>
                      <th scope="col">Job Title</th>
                      <th scope="col">Salaty</th>
                      <th scope="col">Location</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($TotalPosts as $TotalPost)
                     @foreach ($TotalPost->jobposts as $item)
                         <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$TotalPost->business_name}}</td>
                      <td>{{$item->job_title}}</td>
                      <td>{{$item->salary}}</td>
                      <td>{{$item->location}}</td>
                      <td>
                        @if($item->status ==1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href=""><i class="fa fa-edit">Edit</i></a>
                      </td>
                    </tr>
                     @endforeach  
                    @endforeach
                  </tbody>
                </table>
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