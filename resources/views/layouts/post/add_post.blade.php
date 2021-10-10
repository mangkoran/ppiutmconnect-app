@extends('layouts.app')

@section('content')
<div class="d-sm-flex justify-content-between align-items-center">
  @if (isset($eventDesc['isEditing']))
  <h3 class="text-dark mb-4">Edit Event</h3>
  @elseif (isset($eventDesc['isView']))
  <h3 class="text-dark mb-4">Event Information</h3>
  @else
  <h3 class="text-dark mb-4">Add Event</h3>
  @endif
</div>
<div class="mb-3">
  <a class="btn btn-shadow btn-danger" href="{{ route('table') }}">
    <i class="fas fa-angle-left"></i>
    <span>Back</span>
  </a>
</div>
<form action="{{ route('addEvent') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="card shadow">
    <div class="tabbable">
      <div class="tab-content">
        <div class="card-header py-3">
          <p class="text-primary m-0 font-weight-bold">
          @if(isset($eventDesc['isEditing']))
            Edit Event's Information for "{{ $eventDesc['event']['event_title'] }}"
            <input type="hidden" name="isEditing" value=1>
            <input type="hidden" name="e_id" value={{ $eventDesc['event']['event_id'] }}>
          @elseif(isset($eventDesc['isView']))
            {{ $eventDesc['event']['event_title'] }}
          @else
            Insert Event Information
          @endif
          </p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Title<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <input name="e_title" type="text" class="form-control"
                  @if (isset($eventDesc['event']))
                    value="{{ $eventDesc['event']['event_title'] }}"
                    @if (isset($eventDesc['isView']))
                      disabled
                    @endif
                  @else
                    placeholder="Write your title of event here"
                  @endif
                  required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Category<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <select name="e_category" class="form-control" @if (isset($eventDesc['isView'])) disabled @endif required>
                    <option value="" selected>Choose Category</option>
                    <option value="Sport" @isset($eventDesc['event']) @if($eventDesc['event']['event_category'] == "Sport")
                      selected
                    @endif @endisset>Sports</option>
                    <option value="Academic"@isset($eventDesc['event']) @if($eventDesc['event']['event_category'] == "Academic")
                      selected
                    @endif @endisset>Academic</option>
                    <option value="Arts or Music"@isset($eventDesc['event']) @if($eventDesc['event']['event_category'] == "Arts or Music")
                      selected
                    @endif @endisset>Arts or Music</option>
                    <option value="Strategic Studies"@isset($eventDesc['event']) @if($eventDesc['event']['event_category'] == "Strategic Studies")
                      selected
                    @endif @endisset>Strategic Studies</option>
                    <option value="Human Dev"@isset($eventDesc['event']) @if($eventDesc['event']['event_category'] == "Human Dev")
                      selected
                    @endif @endisset>Human Development</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Closed Reg Date<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <input name="e_closed_on" type="date" class="form-control" aria-describedby="date-of-birth"
                  @isset($eventDesc['event'])
                    value={{ $eventDesc['event']['closed_on'] }}
                  @endisset
                  @if (isset($eventDesc['isView'])) disabled @endif
                  required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Event Date<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <input name="e_date" type="date" class="form-control" aria-describedby="date-of-birth"
                  @isset($eventDesc['event'])
                    value={{ $eventDesc['event']['event_date'] }}
                  @endisset
                  @if (isset($eventDesc['isView'])) disabled @endif
                  required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Venue<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <input name="e_venue" type="text" class="form-control" placeholder="Write event's vanue here"
                  @isset($eventDesc['event'])
                    value={{ $eventDesc['event']['event_venue'] }}
                  @endisset
                  @if (isset($eventDesc['isView'])) disabled @endif
                  required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Open For<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <select name="e_open_for" class="form-control" @if (isset($eventDesc['isView'])) disabled @endif required>
                    <option value="" selected>Choose</option>
                    <option value="Participants" @isset($eventDesc['event']) @if($eventDesc['event']['open_for'] == "Participants")
                      selected
                    @endif @endisset>Participants</option>
                    <option value="Committee" @isset($eventDesc['event']) @if($eventDesc['event']['open_for'] == "Committee")
                      selected
                    @endif @endisset>Committee</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">URL (Typeform or Gform)<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <input name="e_url" type="text" class="form-control"
                  @if (isset($eventDesc['event']))
                    value="{{ $eventDesc['event']['event_url'] }}"
                  @else
                    placeholder="Drop your Typeform/Gform's URL here"
                  @endif
                  @if (isset($eventDesc['isView'])) disabled @endif
                  required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Event Details<span style="color: red;">@if (!isset($eventDesc['isView']))*@endif</span></label>
                <div class="col-sm-9">
                  <textarea name="e_details" rows="8" type="text" class="form-control" placeholder="Write details of the event here"  @if (isset($eventDesc['isView'])) disabled @endif  required>@isset($eventDesc['event']){{ $eventDesc['event']['event_details'] }}@endisset</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Picture 1
                @if (!isset($eventDesc['event']))
                  <span style="color: red;">*</span>
                @endif
                {{-- @if ($eventDesc['event']['event_pic1'] != null)
                  (set) @else
                  (not set)
                @endif --}}
                </label>
                @if (isset($eventDesc['isView']))
                <img src="{{ asset('images/event/' . $eventDesc['event']->event_id . '/' . $eventDesc['event']->event_pic2) }}" alt="">
                @else
                <div class="col-sm-9">
                  <input type="file" class="btn btn-primary" name="e_pic1" id=""
                  @if (!isset($eventDesc['event']))
                    required
                  @endif>
                </div>
                @endif
              </div>
              <div class="form-group row">
                <label for="contact-province" class="col-sm-3 col-form-label">Picture 2
                {{-- @if ($eventDesc['event']['event_pic2'] != null)
                  (set) @else
                  (not set)
                @endif --}}
                </label>
                @if (isset($eventDesc['isView']))
                <img src="{{ asset('images/event/' . $eventDesc['event']->event_id . '/' . $eventDesc['event']->event_pic2) }}" alt="">
                @else
                <div class="col-sm-9">
                  <input type="file" class="btn btn-primary" name="e_pic2" id="">
                </div>
                @endif
              </div>
              <div class="form-group row">
                <label for="contact-city" class="col-sm-3 col-form-label">Picture 3
                {{-- @if ($eventDesc['event']['event_pic1'] != null)
                  (set) @else
                  (not set)
                @endif --}}
                </label>
                @if (isset($eventDesc['isView']))
                <img src="{{ asset('images/event/' . $eventDesc['event']->event_id . '/' . $eventDesc['event']->event_pic3) }}" alt="">
                @else
                <div class="col-sm-9">
                  <input type="file" class="btn btn-primary" name="e_pic3" id="">
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="text-right ">
            <a class="btn btn-danger btn-shadow" href="{{ route('table') }}">
              @if (isset($eventDesc['isView'])) Back @else Cancel @endif
            </a>
            @if (!isset($eventDesc['isView']))
            <button type="submit" class="btn btn-success btn-shadow">Submit</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
