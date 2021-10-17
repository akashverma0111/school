@extends('layouts.app')

@section('content')


  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

      
@foreach($courses as $course)

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="{{ asset('storage/uploads/'.$course->course_image)}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{ $course->field }}</h4>
                  <p class="price">{{ $course->fee }}</p>
                </div>
                
                <h3><a href="{{ route('coursedetail', $course->id)}}">{{ $course->course_name }}</a></h3>
                <p>{{ $course->about_course }}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{ asset('storage/uploads/'.$course->course_image)}}" class="img-fluid" alt="">
                    <span>{{ $course->trainer_name }}</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;42
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
@endforeach

       

        </div>

      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->


@endsection