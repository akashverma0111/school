@extends('layouts.admin')

@section('admincontent')



          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">

                Edit Trainer <a class="btn btn-primary" href="{{ route('showtrainer') }}"><i class="icon_plus_alt2"></i>Show Courses</a>

                @if(session()->has('msg'))


                <div class="alert alert-success">
                  {{session()->pull('msg')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
              </header>
              <div class="panel-body">
                <form role="form" action="{{route('updatetrainer')}}" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                    <label for="trainername">Trainer Name</label>
                    <input type="text" class="form-control" name="trainername" id="trainername" value="{{ $trainer->trainer_name }}" placeholder="Enter trainername">
                  </div>
                  <div class="form-group">
                    <label for="trainer_mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="trainer_mobile" value="{{ $trainer->mobile }}" placeholder="Enter trainermobile">
                  </div>
                  <div class="form-group">
                    <label for="field">field</label>
                    <input type="text" class="form-control" id="field" name="field" value="{{ $trainer->field }}" placeholder="Enter total fee">
                  </div>

                  <div class="form-group">
                    <label for="about_trainer"> Description</label>
                    <textarea rows="10" id="aboutcourse" placeholder="Enter trainer Description...." class="form-control" name="about_trainer"> {{ $trainer->about_trainer }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="file">File input</label>
                    <input type="file" id="file" name="file">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <div class="form-group">
                    <img src="{{ asset('storage/uploads/'.$trainer->image) }}"  height="100" >
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </section>
          </div>


@endsection

