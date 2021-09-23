@extends('client.layout.main')

@section('title', 'Lorem Ipsum Dolor')

@section('content')
<div class="nav-spacer"></div>
    <!-- News Navbar -->
    <nav class="navbar bg-light navbar-expand-lg news-nav view-nav">
      <button
        class="navbar-toggler news-nav-toggle mr-auto float-right mt-2"
        type="button"
        data-toggle="collapse"
        data-target="#navbarCategory"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon news-bars">Categories</span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCategory">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="">All</a></li>
          <li class="nav-item"><a class="nav-link" href="">Sports</a></li>
          <li class="nav-item"><a class="nav-link" href="">Academic</a></li>
          <li class="nav-item"><a class="nav-link" href="">Arts</a></li>
          <li class="nav-item"><a class="nav-link" href="">Music</a></li>
          <li class="nav-item">
            <a class="nav-link" href="">Strategic Studies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Human Development</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- News Content -->
    <section id="newsContent">
      <div class="container-fluid pt-5">
        <div class="row mx-auto">
          <div class="col-12">
            <div class="card news-card mx-auto">
              <div id="imgCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="news-view-img"
                      src="{{asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic1)}}"
                      alt="news"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="news-view-img"
                      src="{{asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic2)}}"
                      alt="news"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="news-view-img"
                      src="{{asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic3)}}"
                      alt="news"
                    />
                  </div>
                </div>
                <ol class="carousel-indicators list-inline">
                  <li class="list-inline-item active">
                    <a
                      id="carousel-selector-0"
                      class="selected"
                      data-slide-to="0"
                      data-target="#imgCarousel"
                      ><img class="img-fluid" src="{{asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic1)}}" alt=""
                    /></a>
                  </li>
                  <li class="list-inline-item">
                    <a
                      id="carousel-selector-1"
                      data-slide-to="1"
                      data-target="#imgCarousel"
                      ><img class="img-fluid" src="{{asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic2)}}" alt=""
                    /></a>
                  </li>
                  <li class="list-inline-item">
                    <a
                      id="carousel-selector-2"
                      data-slide-to="2"
                      data-target="#imgCarousel"
                      ><img class="img-fluid" src="{{asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic3)}}" alt=""
                    /></a>
                  </li>
                </ol>
              </div>

              <div class="card-body mt-3">
                <h3>{{ $newsDesc['news']->news_title }}</h3>
                <div class="news-view-details mx-auto">
                  <span class="post-details">
                    Posted by <a class="author-link" href="">Lorem Ipsum</a> </span
                  >
                  <span class="post-details">
                    Category:
                    <a class="category-anchor" href="">{{ $newsDesc['news']->news_category }}</a></span
                  >
                </div>
                <hr />

                <p class="view-para">
                  {{ $newsDesc['news']->news_content }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection