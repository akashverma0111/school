@extends('layouts.admin')

@section('admincontent')



<div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Course  <a class="btn btn-primary" href="{{ route('admincourse') }}"><i class="icon_plus_alt2"></i>Add Courses</a>

                @if(session()->has('msg'))


                <div class="alert alert-success">
                  {{session()->pull('msg')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
              </header>
              <table class="table table-striped table-advance table-hover table-responsive">
                <tbody>
                  <tr>
                    <th><i class="fa fa-home"></i> Course Name</th>
                    <th><i class="icon_profile"></i> Trainer Name</th>
                    <th><i class="fa fa-inr"></i> Fee</th>
                    <th><i class="icon_pin_alt"></i> Sheet</th>
                    <th><i class="icon_calendar"></i> Schedule</th>
                    <th><i class="icon_mail_alt"></i> Description</th>
                    <th><i class="fa fa-file-image-o"></i> Image</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($courses as $course)
                  <tr>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->trainer }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->sheet }}</td>
                    <td>{{ $course->schedule }}</td>
                    <td>{{ $course->about_course }}</td>
                    <td><img src="{{ asset('storage/uploads/'.$course->course_image)}}" alt="not found" height="100"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('admincourse') }}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="{{ route('editcourse', $course->id) }}"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="{{ route('deletecourse', $course->id) }}"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </section>
          </div>



@endsection

