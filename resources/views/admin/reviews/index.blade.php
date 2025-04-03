@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('title')
    Admin : Reviews Management
@endsection

@section('content')
                  {{-- Table --}}
              <div class="container m-5" style="max-height: 100%">
                <div class="my-5">
                  <h3>
                    <i class="bi bi-chat-right-heart"></i>
                    Reviews Management
                  </h3>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center alertDelete mt-3" role="alert">
                      <div>
                        <i class="bi bi-check2-circle"></i>
                        {{ session('success') }}
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center alertDelete mt-3" role="alert">
                  <div>
                    @foreach ($errors->all() as $error)
                    <p><i class="bi bi-exclamation-circle"></i> {{ $error }}</p>
                    @endforeach
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                    
                <!-- Spinner -->
                <div id="spinner" class="text-center my-5">
                  <div class="spinner-border text-primary" role="status">
                      <span class="visually-hidden">Loading...</span>
                  </div>
                </div>

                <!-- Reviews Table -->
                <div id="userTable" style="display: none;">
                  @include('admin.reviews.table') <!-- Dynamically load table -->
                </div>

                @endsection
<script src="/js/admin.js"></script>
