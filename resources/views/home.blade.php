@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Job</div>

                <div class="card-body">
                    <table class="table">
                    <thead>
                    <tr>
                      <th scope="col">Company Name</th>
                      <th scope="col">Job Title</th>
                      <th scope="col">Job Responsibilty</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Location</th>
                      <th scope="col">Posted at</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                      <tbody>
                        @foreach ($TotalPosts as $TotalPost)
                            @foreach ($TotalPost->jobposts as $item)
                            <tr>
                              <td>{{$TotalPost->business_name}}</td>
                              <td>{{$item->job_title}}</td>
                              <td>{!!str_limit($item->job_description, 25)!!}</td>
                              <td>{{$item->salary}}TK</td>
                              <td>{{$item->location}}</td>
                              <td>{{$item->created_at->diffForHumans()}}</td>
                              <td>
                              </td>
                              <td>
                                <a href="{{route('job-details',$item->slug)}}" class="btn btn-success">View</a>
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
