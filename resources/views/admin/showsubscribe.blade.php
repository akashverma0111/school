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
                    <th><i class="icon_profile"></i> email</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($subscribes as $subscribe)
                  <tr>
                    <td>{{ $subscribe->email }}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('contact') }}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="{{ route('deletesubscribe', $subscribe->id) }}"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </section>
          </div>



@endsection

