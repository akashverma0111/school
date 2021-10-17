@extends('layouts.admin')

@section('admincontent')



          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">
                Add Message <a class="btn btn-primary" href="{{ route('showadminmessage') }}"><i class="icon_plus_alt2"></i>Show Message</a>

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
                <form role="form" action="{{route('addadminmessage')}}" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                  	<b>Choose Type:- </b>
                    <label for="type1">Message</label>
                    <input type="radio"  value="message" name="type" id="type1">

                    <label for="type2">Notification</label>
                    <input type="radio"  value="notification" name="type" id="type2">
                  </div>
                  <div class="form-group">
                    <label for="rname">Receiver Name</label>
                                        
                    <select class="form-control" name="reciever_id"  id="companyname">
                    	<option selected disabled>Select Reciever name</option>
                    	@foreach( $users as $user )
                    	<option value="{{ $user->id }}"> {{ $user->name }}</option>
                    	@endforeach
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea rows="10" id="message" placeholder="Enter message" class="form-control" name="message"></textarea>

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

