<!DOCTYPE html>
<html>

<head>
  <title>UTM Connect - PPI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ICONS -->
  <link rel="icon" href="assets/icon/favicon.ico" />
  <script src="https://kit.fontawesome.com/f9c45ad44a.js" crossorigin="anonymous"></script>
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@100;200;300;400;700&family=Roboto:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- BOOTSTRAP 4.6.0 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="css/styles.css" />

</head>

<body>
  <section id="navMenu">
    <nav class="nav-head navbar fixed-top navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="assets/icon/android-icon-72x72.png" /> UTM CONNECT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#news">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Academic</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Organization</a>
            <div class="dropdown-menu animated--grow-in">
              <a href="" class="dropdown-item">Divison</a>
              <a href="" class="dropdown-item">Aspiration</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-std btn-round btn-login" data-toggle="modal" data-target="#loginModal">
              Login
            </button>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="title">
    <div class="container-fluid title-container">
      <div class="title-head">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="hover">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-lg-6 text-column">
                  <h1 class="carousel-heading">Get the latest news update and announcements!</h1>
                </div>
                <div class="col-lg-6 img-column">
                  <a href='https://pngtree.com/so/news-clipart' style="pointer-events:none"><img class="news-carousel-img" src="assets/img/news.png" alt="news"/></a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 button-column">
                    <a class="buttons" href="#news"><button class="btn btn-red btn-lg btn-block"> Check out the hottest news</button></a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-6 text-column">
                  <h1 class="carousel-heading">Be in the know of the latest events!</h1>
                </div>
                <div class="col-lg-6 img-column">
                  <a href='https://pngtree.com/so/calendar-clipart' style="pointer-events:none"><img class="calendar-carousel-img" src="assets/img/calendar.png"/></a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 button-column">
                  <a class="buttons" href="#events"><button class="btn btn-red btn-lg btn-block">Check out upcoming events</button></a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-6 text-column">
                  <h1 class="carousel-heading">Step up your learning, share and get resources here!</h1>
                </div>
                <div class="col-lg-6 img-column">
                  <a href=""><img class="calendar-carousel-img" src="assets/img/book.png"/></a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 button-column">
                  <a class="buttons" href="#academics"><button class="btn btn-red btn-lg btn-block">Check out academic support</button></a>
                </div>
              </div>
            </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

  </section>
  <section id="news">
    <div class="container-fluid content-container">
      <div class="content-subheading-container">
        <div class="content-subheading">
          <h2 class="subheading-title">News <span style = "display: block;">&</span><span style = "display: block;">Announcements</span></h2>
          <hr class="separator"/>
        </div>
      </div>
      <div id="carouselNews" class="carousel slide" data-ride="carousel" data-interval="10000" data-pause="hover">
        <div class="carousel-inner">
          <div class="news-item carousel-item active">
            <div class="row news-preview-row">
              <div class="col-lg-6 col-md-6 col-sm-6 news-preview-column">
                <img class="news-content-img img-fluid" src="news/img/1.jpg" alt="news"/>
                <div class="text-news">
                  <h3 class="news-title-preview">Lorem Ipsum Dolor Sit Amet</h3>
                  <div class="news-paragraph-preview">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                      Enim sed faucibus turpis in eu mi bibendum.
                      Habitasse platea dictumst vestibulum rhoncus est.
                      Amet purus gravida quis blandit turpis cursus in hac habitasse.
                      Viverra ipsum nunc aliquet bibendum enim. <a class="read-more" href="">...Read more</a>
                    </p>
                    <div class="news-preview-details ml-auto">
                      <span class="post-details"> Posted by <a class="author-link" href="">Lorem Ipsum</a> on 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 news-preview-column">
                <img class="news-content-img img-fluid" src="news/img/2.jpg" alt="news"/>
                <div class="text-news">
                  <h3 class="news-title-preview">Lorem Ipsum Dolor Sit Amet</h3>
                  <div class="news-paragraph-preview">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                      Enim sed faucibus turpis in eu mi bibendum.
                      Habitasse platea dictumst vestibulum rhoncus est.
                      Amet purus gravida quis blandit turpis cursus in hac habitasse.
                      Viverra ipsum nunc aliquet bibendum enim. <a class="read-more" href="">...Read more</a>
                    </p>
                    <div class="news-preview-details ml-auto">
                      <span class="post-details"> Posted by <a class="author-link" href="">Lorem Ipsum</a> on 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="news-item carousel-item">
            <div class="row news-preview-row">
              <div class="col-lg-6 col-md-6 col-sm-6 news-preview-column">
                <img class="news-content-img img-fluid" src="news/img/2.jpg" alt="news"/>
                <div class="text-news">
                  <h3 class="news-title-preview">Lorem Ipsum Dolor Sit Amet</h3>
                  <div class="news-paragraph-preview">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                      Enim sed faucibus turpis in eu mi bibendum.
                      Habitasse platea dictumst vestibulum rhoncus est.
                      Amet purus gravida quis blandit turpis cursus in hac habitasse.
                      Viverra ipsum nunc aliquet bibendum enim. <a class="read-more" href="">...Read more</a>
                    </p>
                    <div class="news-preview-details ml-auto">
                      <span class="post-details"> Posted by <a class="author-link" href="">Lorem Ipsum</a> on 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 news-preview-column">
                <img class="news-content-img img-fluid" src="news/img/1.jpg" alt="news"/>
                <div class="text-news">
                  <h3 class="news-title-preview">Lorem Ipsum Dolor Sit Amet</h3>
                  <div class="news-paragraph-preview">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                      Enim sed faucibus turpis in eu mi bibendum.
                      Habitasse platea dictumst vestibulum rhoncus est.
                      Amet purus gravida quis blandit turpis cursus in hac habitasse.
                      Viverra ipsum nunc aliquet bibendum enim. <a class="read-more" href="">...Read more</a>
                    </p>
                    <div class="news-preview-details">
                      <span class="post-details"> Posted by <a class="author-link" href="">Lorem Ipsum</a> on 31 - 02 - 2069</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
            <a class="carousel-control-prev" href="#carouselNews" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselNews" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

        <button class="btn btn-news-preview btn-lg btn-block">See all news</button>
    </div>
  </section>

  <section id="events">
      <div class="container-fluid content-container">
        <div class="content-subheading-container">
          <div class="content-subheading">
            <h2 class="subheading-title">Upcoming <span style = "display: block;">Events</span></h2>
            <hr class="separator"/>
          </div>
        </div>
      </div>
      <div id="carouselEvent" class="carousel slide" data-ride="carousel" data-interval="10000" data-pause="hover">
        <div class="carousel-inner">
          <div class="event-item carousel-item active">
            <div class="row event-preview-row">
              <div class="col-lg-4 col-md-4 col-sm-4 event-preview-column">
                <div class="card">
                  <div class="card-header event-header">
                    <h4 class="event-title"><a href="">Event</a></h4>

                  </div>
                  <div class="card-body event-body">
                      <img class="img-fluid" src="events/img/event.jpg" alt="">
                      <div class="event-description">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Date: </span>
                            <span style="display:block;">The date</span>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Venue:</span>
                            <span style="display:block;">The venue</span>
                          </div>
                        </div>
                        <h6>Event Description: </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Enim sed faucibus turpis in eu mi bibendum.
                        </p>
                      </div>
                      <a href=""><button class="btn btn-red">Check out event</button></a>
                  </div>

                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 event-preview-column">
                <div class="card">
                  <div class="card-header event-header">
                    <h4 class="event-title"><a href="">Event</a></h4>

                  </div>
                  <div class="card-body event-body">
                      <img class="img-fluid" src="events/img/musicevent.jpg" alt="">
                      <div class="event-description">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Date: </span>
                            <span style="display:block;">The date</span>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Venue:</span>
                            <span style="display:block;">The venue</span>
                          </div>
                        </div>
                        <h6>Event Description: </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Enim sed faucibus turpis in eu mi bibendum.
                        </p>
                      </div>
                      <a href=""><button class="btn btn-red">Check out event</button></a>
                  </div>

                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 event-preview-column">
                <div class="card">
                  <div class="card-header event-header">
                    <h4 class="event-title"><a href="">Event</a></h4>

                  </div>
                  <div class="card-body event-body">
                      <img class="img-fluid" src="events/img/event.jpg" alt="">
                      <div class="event-description">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Date: </span>
                            <span style="display:block;">The date</span>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Venue:</span>
                            <span style="display:block;">The venue</span>
                          </div>
                        </div>
                        <h6>Event Description: </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Enim sed faucibus turpis in eu mi bibendum.
                        </p>
                      </div>
                      <a href=""><button class="btn btn-red">Check out event</button></a>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="event-item carousel-item">
            <div class="row event-preview-row">
              <div class="col-lg-4 col-md-4 col-sm-4 event-preview-column">
                <div class="card">
                  <div class="card-header event-header">
                    <h4 class="event-title"><a href="">Event</a></h4>

                  </div>
                  <div class="card-body event-body">
                      <img class="img-fluid" src="events/img/musicevent.jpg" alt="">
                      <div class="event-description">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Date: </span>
                            <span style="display:block;">The date</span>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Venue:</span>
                            <span style="display:block;">The venue</span>
                          </div>
                        </div>
                        <h6>Event Description: </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Enim sed faucibus turpis in eu mi bibendum.
                        </p>
                      </div>
                      <a href=""><button class="btn btn-red">Check out event</button></a>
                  </div>

                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 event-preview-column">
                <div class="card">
                  <div class="card-header event-header">
                    <h4 class="event-title"><a href="">Event</a></h4>

                  </div>
                  <div class="card-body event-body">
                      <img class="img-fluid" src="events/img/event.jpg" alt="">
                      <div class="event-description">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Date: </span>
                            <span style="display:block;">The date</span>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Venue:</span>
                            <span style="display:block;">The venue</span>
                          </div>
                        </div>
                        <h6>Event Description: </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Enim sed faucibus turpis in eu mi bibendum.
                        </p>
                      </div>
                      <a href=""><button class="btn btn-red">Check out event</button></a>
                  </div>

                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 event-preview-column">
                <div class="card">
                  <div class="card-header event-header">
                    <h4 class="event-title"><a href="">Event</a></h4>

                  </div>
                  <div class="card-body event-body">
                      <img class="img-fluid" src="events/img/musicevent.jpg" alt="">
                      <div class="event-description">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Date: </span>
                            <span style="display:block;">The date</span>
                          </div>
                          <div class="col-lg-6 col-sm-6 col-md-6 event-subheading">
                            <span style="font-weight:bold;">Venue:</span>
                            <span style="display:block;">The venue</span>
                          </div>
                        </div>
                        <h6>Event Description: </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Enim sed faucibus turpis in eu mi bibendum.
                        </p>
                      </div>
                      <a href=""><button class="btn btn-red">Check out event</button></a>
                  </div>

                </div>
              </div>
            </div>
          </div>
          </div>
            <a class="carousel-control-prev" href="#carouselEvent" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselEvent" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
  </section>
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="email1"placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <a class="no-deco" href="index.php"><button type="button" class="btn btn-std btn-block btn-round">Login</button></a>
          </form>

          <div class="text-center text-muted delimiter">or use a social network</div>
          <div class="d-flex justify-content-center social-buttons">
            <button type="button" class="btn btn-std btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-std btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fab fa-facebook"></i>
            </button>
            <button type="button" class="btn btn-std btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
              <i class="fab fa-linkedin"></i>
            </button>
          </di>
        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="#a" class="no-deco"> Sign Up</a>.</div>
      </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>
