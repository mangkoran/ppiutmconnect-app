@extends('client.layout.main')
@section('title', 'Aspiration')
@section('content')
<!---
Insert Here
--->
<!---
Content
--->
<section id="header">
    <div class="container-fluid header-container">
        <div class="header-head">
            <h1 class="header-title">Aspiration</h1>
        </div>
    </div>
</section>
<section id="division">
  <div class="container-fluid px-1">
    <div class="px-5 mb-3">
      <button class="btn btn-red btn-md mt-2" data-toggle="modal" data-target="#aspirationModal">Submit your idea</button>
    </div>
    <div class="owl-carousel owl-theme">
        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Academic Division</h4>
          <div class="card-body">
            <div class="card feedback-list-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 feedback-profile">
                    <span class="d-block text-gray-600 small mx-auto mb-2" >
                        @if (session('user_email'))
                            {{ session('user_email') }}
                        @else
                            Udin Saleh
                        @endif
                    </span>
                    <img class="border rounded-circle img-profile avatar mx-auto" src="{{asset('projectad/assets/img/profile.jpg')}}"></a>
                  </div>
                  <div class="col-9">
                    <div class="d-block">
                      <h5 class="text-left">Aspiration Subject</h5>
                      <p class="feedback-content mx-1 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Enim sed faucibus turpis in eu mi bibendum.
                  Habitasse platea dictumst vestibulum rhoncus est.
                  Amet purus gravida quis blandit turpis cursus in hac habitasse.
                  Viverra ipsum nunc aliquet bibendum enim.</p>
                      <span class="d-block text-gray-600 small text-right mr-3 mt-2">Posted on: 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card feedback-list-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 feedback-profile">
                    <span class="d-block text-gray-600 small mx-auto mb-2" >
                        @if (session('user_email'))
                            {{ session('user_email') }}
                        @else
                            Udin Saleh
                        @endif</span>
                    <img class="border rounded-circle img-profile avatar mx-auto" src="{{asset('projectad/assets/img/profile.jpg')}}"></a>
                  </div>
                  <div class="col-9">
                    <div class="d-block">
                      <h5 class="text-left">Aspiration Subject</h5>
                      <p class="feedback-content mx-1 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Enim sed faucibus turpis in eu mi bibendum.
                  Habitasse platea dictumst vestibulum rhoncus est.
                  Amet purus gravida quis blandit turpis cursus in hac habitasse.
                  Viverra ipsum nunc aliquet bibendum enim.</p>
                      <span class="d-block text-gray-600 small text-right mr-3 mt-2">Posted on: 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card feedback-list-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 feedback-profile">
                    <span class="d-block text-gray-600 small mx-auto mb-2" >
                        @if (session('user_email'))
                            {{ session('user_email') }}
                        @else
                            Udin Saleh
                        @endif
                    </span>
                    <img class="border rounded-circle img-profile avatar mx-auto" src="{{asset('projectad/assets/img/profile.jpg')}}"></a>
                  </div>
                  <div class="col-9">
                    <div class="d-block">
                      <h5 class="text-left">Aspiration Subject</h5>
                      <p class="feedback-content mx-1 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Enim sed faucibus turpis in eu mi bibendum.
                  Habitasse platea dictumst vestibulum rhoncus est.
                  Amet purus gravida quis blandit turpis cursus in hac habitasse.
                  Viverra ipsum nunc aliquet bibendum enim.</p>
                      <span class="d-block text-gray-600 small text-right mr-3 mt-2">Posted on: 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Art, Sport, and Culture Division</h4>
          <div class="card-body">
             <!--Iterate  -->
          </div>
        </div>

        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Public Relation Division</h4>
          <div class="card-body">
             <!--Iterate  -->
          </div>
        </div>

        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Strategic Planning Division</h4>
          <div class="card-body">
             <!--Iterate  -->
          </div>
        </div>

        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Publication and Media Division</h4>
          <div class="card-body">
             <!--Iterate  -->
          </div>
        </div>

        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Entrepreneurship</h4>
          <div class="card-body">
             <!--Iterate  -->
          </div>
        </div>


        <div class="card bordered-col-lg pt-3 mb-2">
          <h4>Internal Division</h4>
          <div class="card-body">
            <div class="card feedback-list-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 feedback-profile">
                    <span class="d-block text-gray-600 small mx-auto mb-2" >
                        @if (session('user_email'))
                            {{ session('user_email') }}
                        @else
                            Udin Saleh
                        @endif
                    </span>
                    <img class="border rounded-circle img-profile avatar mx-auto" src="{{asset('projectad/assets/img/profile.jpg')}}"></a>
                  </div>
                  <div class="col-9">
                    <div class="d-block">
                      <h5 class="text-left">Aspiration Subject</h5>
                      <p class="feedback-content mx-1 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Enim sed faucibus turpis in eu mi bibendum.
                  Habitasse platea dictumst vestibulum rhoncus est.
                  Amet purus gravida quis blandit turpis cursus in hac habitasse.
                  Viverra ipsum nunc aliquet bibendum enim.</p>
                      <span class="d-block text-gray-600 small text-right mr-3 mt-2">Posted on: 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    </div>
  </div>
</section>

<div class="modal fade" id="aspirationModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-title text-center">
            <h4>Aspiration</h4>
          </div>
          <div class="d-flex flex-column text-center">
            <form action="">
              <div class="form-group">
                <label for="divisionSelect">Select Division</label>
                <select name="division" id="divisionSelect">
                  <option value="Academic Division">Academic</option>
                  <option value="Publication and Media Division">Publication and Media</option>
                  <option value="Internal Division">Internal</option>
                  <option value="Arts, Sport, and Culture Division">Arts, Sports, and Culture</option>
                  <option value="Entrepreneurship Division">Entrepreneurship</option>
                  <option value="Public Relation Division">Public Relations</option>
                  <option value="Strategic Planning Division">Strategic Planning</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" name="aspirationTitle" id="" placeholder="Your aspiration title">
              </div>
              <div class="form-group">
                <textarea name="aspirationContent" cols="30" rows="10" placeholder="Your idea"></textarea>
              </div>
              <input type="submit" class="btn btn-std btn-block btn-round" value="Submit">
            </form>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
