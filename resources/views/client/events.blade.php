@extends('client.layout.main')

@section('title', 'Events')

@section('content')
<section id="header">
  <div class="container-fluid header-container">
    <div class="header-head">
      <h1 class="header-title">Events</h1>
    </div>
  </div>
</section>

<!-- Content -->
<!-- Kurang search bar/filter bar-->
<section id="listEvents">
  <div class="container-fluid">
    <div class="filter-bar">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <form class="filter-form">

              <div class="input-group">
                <input type="search" class="form-control" placeholder="Search for events" name="" id="searchBar">
              </div>
              <div class="input-group">
                <label class="filter-label" for="eventcategories">Filter category: </label>
                <select class="form-control" name="eventcategories" id="eventcategories">
                  <option value="All" default>All</option>
                  <option value="Career">Career</option>
                  <option value="Award">Award</option>
                  <option value="Sport">Sport</option>
                  <option value="Innovation">Innovation</option>
                  <option value="Cultural">Cultural</option>
                  <option value="Academic">Academic</option>
                  <option value="Volunteer">Volunteer</option>
                  <option value="Entrepreneurship">Entrepreneurship</option>
                  <option value="Leadership">Leadership</option>
                </select>
              </div>
              <div class="input-group">
                <label class="filter-label" for="eventdate">Filter by date: </label>
                <input class="form-control" type="date" name="eventdate" id="eventdate">
              </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid list-container">
    <div class="row justify-content-center">
      <!-- Event Cards-->
      @foreach ($events as $event)
      <div class="col-lg-12 col-md-12 col-12 card-column">
        <div class="card mb-3 list-card">
          <div class="row no-gutters event-card">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <img class="img-fluid event-card-img text-left" src="{{asset('images/event/' . $event->event_id . '/' . $event->event_pic1)}}" class="card-img-right" alt="">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
              <div class="card-body event-card-body">
                <h4 class="event-title">{{ $event->event_title }}</h4>
                <div class="event-card-details">
                      <span class="post-details"> Category:<p class="event-category">{{ $event->event_category }}</p></span>
                </div>
                <div class="row event-description justify-content-center">
                  <div class="col-lg-6 col-sm-6 col-md-6 mb-2 event-subheading">
                    <span style="font-weight:bold;">Date:</span>
                    <span style="display:block;">{{ $event->event_date }}</span>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                    <span style="font-weight:bold;">Venue:</span>
                    <span style="display:block;">{{ $event->event_venue }}</span>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 mb-2 event-subheading">
                    <span style="font-weight:bold;">Posted on:</span>
                    <span style="display:block;">{{ $event->posted_on }}</span>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 mb-2 event-subheading">
                    <span style="font-weight:bold;">Registration Closed:</span>
                    <span style="display:block;">{{ $event->closed_on }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-right event-button">
            <a href="{{route('user-view-event', $event->event_id)}}"><button class="btn btn-red">Check out event</button></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



@endsection
@section('script')
<script>
$('#searchBar').keyup(function(e){
  $('.event-title').each(function(e){
    if($(this).text().toLowerCase().indexOf($('#searchBar').val().toLowerCase())!=-1){
      $(this).parent().parent().parent().parent().parent().css('display', 'block');
    }
    else{
      $(this).parent().parent().parent().parent().parent().css('display', 'none');
    }
  });
}
);
</script>
@endsection