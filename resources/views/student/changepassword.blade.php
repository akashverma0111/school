@extends('layouts.student')

@section('studentcontent')


          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">

               Change Password

              </header>
              <div class="panel-body">
                <form role="form" action="{{route('changepassword')}}" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                    <label for="opass"> Old Password</label>
                    <input type="text" class="form-control" name="opass" id="opass" placeholder="Enter old Password">
               
                @if(session()->has('opass'))
                  
            <div class="text-danger"><b>{{session()->pull('opass')}}</b></div>
                @endif
                  </div>
                  <div class="form-group">
                    <label for="npass"> New Password</label>
                    <input type="text" class="form-control" name="npass" id="npass" placeholder="Enter new Password">
                @if(session()->has('npass'))
                  
            <div class="text-danger"><b>{{session()->pull('npass')}}</b></div>
                @endif
                  </div>

                  <div class="form-group">
                    <label for="cpass"> Confirm Password</label>
                    <input type="text" class="form-control" name="cpass" id="cpass" placeholder="Enter Confirm Password">
                @if(session()->has('cpass'))
                  
            <div class="text-danger"><b>{{session()->pull('cpass')}}</b></div>
                @endif
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