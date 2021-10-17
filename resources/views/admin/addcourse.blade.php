@extends('layouts.admin')

@section('admincontent')



          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">
                Add Courses <a class="btn btn-primary" href="{{ route('showcourse') }}"><i class="icon_plus_alt2"></i>Show Courses</a>

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
                <form role="form" action="{{route('addcourse')}}" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                    <label for="coursename">Course Name</label>
                    <input type="text" class="form-control" name="coursename" id="coursename" placeholder="Enter coursename">
                  </div>
                  <div class="form-group">
                    <label for="trainername">Trainer Name</label>
                    <input type="text" class="form-control" name="trainername" id="trainername" placeholder="Enter trainername">
                  </div>
                  <div class="form-group">
                    <label for="fee">Fee</label>
                    <input type="text" class="form-control" id="fee" name="fee" placeholder="Enter total fee">
                  </div>
                  <div class="form-group">
                    <label for="sheet">Sheet</label>
                    <input type="text" class="form-control" id="sheet" name="sheet" placeholder="Available sheet">
                  </div>

                  <div class="form-group">
                    <label for="schedule">Schedule</label>
                    <input type="text" class="form-control" id="schedule" name="schedule" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="aboutcourse">Course Description</label>
                    <textarea rows="10" id="aboutcourse" placeholder="Enter Course Description...." class="form-control" name="aboutcourse"></textarea>
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
<script type="text/javascript">
  var s = document.getElementById('file');
  s.addEventListener("change", function(){
  console.log(s.files[0]);
  console.log(s.files[0]['webkitRelativePath']);
  console.log(URL.createObjectURL(s.files[0]));
});

</script>
	

@endsection

