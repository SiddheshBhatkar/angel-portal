@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0 font-weight-bold">{{ ucwords(session('name')) }}</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="card col-md-3" style="background-color:#F2125E;color:#fff;">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between">
            <h4 class="card-title mb-3" style="color:#fff;">Total Students</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <h3>{{ $st_count }}</h3>
            </div>
          </div>
        </div>
      </div>
       <div class="card col-md-3" style="background-color:#2A80FF;color:#fff;">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between">
            <h4 class="card-title mb-3" style="color:#fff;">Total Teachers</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <h3>{{ $tc_count }}</h3>
            </div>
          </div>
        </div>
      </div>
       <div class="card col-md-3" style="background-color:#17C98C;color:#fff;">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between">
            <h4 class="card-title mb-3" style="color:#fff;">Total Standard</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <h3>{{ $std_count }}</h3>
            </div>
          </div>
        </div>
      </div>
       <div class="card col-md-3" style="background-color:#FF9321;color:#fff;">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between">
            <h4 class="card-title mb-3" style="color:#fff;">Total Classroom</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <h3>{{ $cl_count }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop        