@extends('admin.layouts.app')

@section('content')

<h1 align="center"><i class="fa fa-university"></i> <u>Role Management</u> <i class="fa fa-university"></i></h1>
<div class="card shadow container col-12 mt-0">
  <div class="tabbable">
    <div class="tab-content">
      <div class="card-body">
      <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <div>
          <form action="{{ route('memberCSV') }}" method="POST" enctype="multipart/form-data" >
          @csrf
            <input type="file" class="btn-primary" style="border-radius: 10px;" name="csv_file" required>
            <button type="submit" class="btn-primary" style="border-radius: 10px;"><i class="fa fa-file-excel-o"></i> Import CSV</button>
          </form>
        </div>
        <div class="mb-3 text-right">
            <div class="dropdown" >
                <button class="btn-secondary dropdown-toggle p-1" style="border-radius: 10px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='fas fa-stream'></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('user-home') }}">Go to Member Side</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
      </div>
        <div class="table-responsive">
          <form method="POST" action="{{ route('changeGrant') }}" enctype="multipart/form-data">
          @csrf
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>Name</th>
                  <th>Matric No</th>
                  <th>Program Code</th>
                  <th>Role</th>
                  <th>Action Button</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($members as $key => $member)
                <tr>
                  <td>{{ $member->name }}</td>
                  <td align="center">{{ $member->matrix_card }}</td>
                  <td align="center">{{ $member->program_code }}</td>
                  <td align="center">
                    @if (Auth::user()->matrix_card == $member->matrix_card)
                      <input type="hidden" name="role[]" value="{{ $member->access_grant }}">
                    @endif
                    <select name="role[]" style="color: white"
                    @if (Auth::user()->matrix_card == $member->matrix_card)
                      disabled
                    @endif
                    >
                      @if ($member->access_grant == 1)
                        <option value='1' selected="selected">Member</option>
                      @else
                        <option value='1'>Member</option>
                      @endif
                      @if ($member->access_grant == 2)
                        <option value='2' selected="selected">Management</option>
                      @else
                        <option value='2'>Management</option>
                      @endif
                      @if ($member->access_grant == 3)
                        <option value='3' selected="selected">DB Admin</option>
                      @else
                        <option value='3'>DB Admin</option>
                      @endif
                    </select>
                  </td>
                  <input type="hidden" name="id[]" value="{{ $member->matrix_card }}">
                  <td align="center">
                    <button class="btn-light" name="submit" value="{{ $key }}" type="submit"
                    @if (Auth::user()->matrix_card == $member->matrix_card)
                      disabled
                    @endif
                    >Apply Changes</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
