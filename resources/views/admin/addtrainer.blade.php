@extends('layouts.admin')

@section('admincontent')



          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">
                Add Courses <a class="btn btn-primary" href="{{ route('showtrainer') }}"><i class="icon_plus_alt2"></i>Show Trainer</a>

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
                <form role="form" action="{{route('addtrainer')}}" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                    <label for="trainername">Trainer Name</label>
                    <input type="text" class="form-control" name="trainername" id="trainername" placeholder="Enter trainername">
                  </div>
                  <div class="form-group">
                    <label for="trainermobile">Mobile</label>
                    <input type="text" class="form-control" name="trainermobile" id="trainermobile" placeholder="Enter trainermobile">
                  </div>
                  <div class="form-group">
                    <label for="field">field</label>
                    <input type="text" class="form-control" id="field" name="field" placeholder="Enter total field">
                  </div>

                  <div class="form-group">
                    <label for="abouttrainer">Trainer Description</label>
                    <textarea rows="10" id="abouttrainer" placeholder="Enter abouttrainer Description...." class="form-control" name="abouttrainer"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="file">File input</label>
                    <input type="file" id="file" name="file">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <div class="form-group">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </section>
          </div>


@endsection

