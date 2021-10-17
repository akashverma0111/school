@extends('layouts.student')

@section('studentcontent')


          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">

                Profile Update

              </header>
              <div class="panel-body">
                <form role="form" action="{{route('updateprofile')}}" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                    <label for="username"> Name</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ $user->user_name }}" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="user_mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="user_mobile" value="{{ $user->mobile }}" placeholder="Enter mobile">
                  </div>
                  <div class="form-group">
                    <label for="address1"> Current Address</label>
                    <textarea rows="10" id="address1" placeholder="Enter current address" class="form-control" name="address1"> {{ $user->address1 }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="address2"> Parmanent Address</label>
                    <textarea rows="10" id="address1" placeholder="Enter parmanent address" class="form-control" name="address2"> {{ $user->address2 }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="file">File input</label>
                    <input type="file" id="file" name="file">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <div class="form-group">
                    <img src="{{ asset('storage/uploads/'.$user->user_image) }}"  height="100" >
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </section>
          </div>



@endsection