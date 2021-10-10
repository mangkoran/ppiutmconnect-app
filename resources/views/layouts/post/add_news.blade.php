{{-- @extends('layouts.app')

@section('content')
    <div class="d-sm-flex justify-content-between align-items-center">
        <h3 class="text-dark mb-4">Add News</h3>
    </div>
    <div class="mb-3">
        <a class="btn btn-shadow btn-danger" href="{{ route('table') }}">
            <i class="fas fa-angle-left"></i>
            <span>Back</span>
        </a>
    </div>
    <form action="{{ route('addNews') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow">
            <div class="tabbable">
                <div class="tab-content">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Insert News Information</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="news_title" type="text" class="form-control"
                                            value="{{ old('title') }}" placeholder="Write your title of news here"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category<span
                                            style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="news_category" class="form-control" required>
                                            <option value="" selected>Choose Category</option>
                                            <option value="Sport">Sports</option>
                                            <option value="Academic">Academic</option>
                                            <option value="Arts or Music">Arts or Music</option>
                                            <option value="Strategic Studies">Strategic Studies</option>
                                            <option value="Human Dev">Human Development</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">News Details<span
                                            style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="news_content" rows="8" type="text" class="form-control"
                                            placeholder="Write details of the news here"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Picture 1<span
                                            style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="file" class="btn btn-primary" value="Upload Picture" name="news_pic1"
                                            id="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact-province" class="col-sm-3 col-form-label">Picture 2</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="btn btn-primary" value="Upload Picture" name="news_pic2"
                                            id="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact-city" class="col-sm-3 col-form-label">Picture 3</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="btn btn-primary" value="Upload Picture" name="news_pic3"
                                            id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a class="btn btn-danger btn-shadow" href="{{ route('table') }}">Cancel</a>
                            <button type="submit" class="btn btn-success btn-shadow">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
 --}}




@extends('layouts.app')

@section('content')
<div class="d-sm-flex justify-content-between align-items-center">
  <h3 class="text-dark mb-4">Add news</h3>
</div>
<div class="mb-3">
  <a class="btn btn-shadow btn-danger" href="{{ route('table') }}">
    <i class="fas fa-angle-left"></i>
    <span>Back</span>
  </a>
</div>
<form action="{{ route('addNews') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="card shadow">
    <div class="tabbable">
      <div class="tab-content">
        <div class="card-header py-3">
          <p class="text-primary m-0 font-weight-bold">
          @if(isset($newsDesc['isEditing']))
            Edit news's Information for "{{ $newsDesc['news']['news_title'] }}"
            <input type="hidden" name="isEditing" value=1>
            <input type="hidden" name="news_id" value={{ $newsDesc['news']['news_id'] }}>
          @elseif(isset($newsDesc['isView']))
            {{ $newsDesc['news']['news_title'] }}
          @else
            Insert news Information
          @endif
          </p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Title<span style="color: red;">@if (!isset($newsDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <input name="news_title" type="text" class="form-control"
                  @if (isset($newsDesc['news']))
                    value="{{ $newsDesc['news']['news_title'] }}"
                    @if (isset($newsDesc['isView']))
                      disabled
                    @endif
                  @else
                    placeholder="Write your title of news here"
                  @endif
                  required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Category<span style="color: red;">@if (!isset($newsDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <select name="news_category" class="form-control" @if (isset($newsDesc['isView'])) disabled @endif required>
                    <option value="" selected>Choose Category</option>
                    <option value="Sport" @isset($newsDesc['news']) @if($newsDesc['news']['news_category'] == "Sport")
                      selected
                    @endif @endisset>Sports</option>
                    <option value="Academic"@isset($newsDesc['news']) @if($newsDesc['news']['news_category'] == "Academic")
                      selected
                    @endif @endisset>Academic</option>
                    <option value="Arts or Music"@isset($newsDesc['news']) @if($newsDesc['news']['news_category'] == "Arts or Music")
                      selected
                    @endif @endisset>Arts or Music</option>
                    <option value="Strategic Studies"@isset($newsDesc['news']) @if($newsDesc['news']['news_category'] == "Strategic Studies")
                      selected
                    @endif @endisset>Strategic Studies</option>
                    <option value="Human Dev"@isset($newsDesc['news']) @if($newsDesc['news']['news_category'] == "Human Dev")
                      selected
                    @endif @endisset>Human Development</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">news Details<span style="color: red;">@if (!isset($newsDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <textarea name="news_content" rows="8" type="text" class="form-control" placeholder="Write details of the news here"  @if (isset($newsDesc['isView'])) disabled @endif  required>@isset($newsDesc['news']){{ $newsDesc['news']['news_content'] }}@endisset</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Picture 1
                @if (!isset($newsDesc['news']))
                  <span style="color: red;">*</span>
                @endif
                {{-- @if ($newsDesc['news']['news_pic1'] != null)
                  (set) @else
                  (not set)
                @endif --}}
                </label>
                @if (isset($newsDesc['isView']))
                <img src="{{ asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic2) }}" alt="">
                @else
                <div class="col-sm-9">
                  <input type="file" class="btn btn-primary" name="news_pic1" id=""
                  @if (!isset($newsDesc['news']))
                    required
                  @endif>
                </div>
                @endif
              </div>
              <div class="form-group row">
                <label for="contact-province" class="col-sm-3 col-form-label">Picture 2
                {{-- @if ($newsDesc['news']['news_pic2'] != null)
                  (set) @else
                  (not set)
                @endif --}}
                </label>
                @if (isset($newsDesc['isView']))
                <img src="{{ asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic2) }}" alt="">
                @else
                <div class="col-sm-9">
                  <input type="file" class="btn btn-primary" name="news_pic2" id="">
                </div>
                @endif
              </div>
              <div class="form-group row">
                <label for="contact-city" class="col-sm-3 col-form-label">Picture 3
                {{-- @if ($newsDesc['news']['news_pic1'] != null)
                  (set) @else
                  (not set)
                @endif --}}
                </label>
                @if (isset($newsDesc['isView']))
                <img src="{{ asset('images/news/' . $newsDesc['news']->news_id . '/' . $newsDesc['news']->news_pic3) }}" alt="">
                @else
                <div class="col-sm-9">
                  <input type="file" class="btn btn-primary" name="news_pic3" id="">
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="text-right ">
            <a class="btn btn-danger btn-shadow" href="{{ route('table') }}">
              @if (isset($newsDesc['isView'])) Back @else Cancel @endif
            </a>
            @if (!isset($newsDesc['isView']))
            <button type="submit" class="btn btn-success btn-shadow">Submit</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection

