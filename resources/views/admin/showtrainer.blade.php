@extends('layouts.admin')

@section('admincontent')



<div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Course  <a class="btn btn-primary" href="{{ route('admintrainer') }}"><i class="icon_plus_alt2"></i>Add Trainer</a>

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
                    <th><i class="icon_profile"></i> Trainer Name</th>
                    <th><i class="fa fa-inr"></i> field</th>
                    <th><i class="icon_pin_alt"></i> Mobile</th>
                    <th><i class="icon_mail_alt"></i> Description</th>
                    <th><i class="fa fa-file-image-o"></i> Image</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($trainers as $trainer)
                  <tr>
                    <td>{{ $trainer->trainer_name }}</td>
                    <td>{{ $trainer->field }}</td>
                    <td>{{ $trainer->mobile }}</td>
                    <td>{{ $trainer->about_trainer }}</td>
                    <td><img src="{{ asset('storage/uploads/'.$trainer->image)}}" alt="not found" height="100"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('admintrainer') }}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="{{ route('edittrainer', $trainer->id) }}"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="{{ route('deletetrainer', $trainer->id) }}"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </section>
          </div>



@endsection

