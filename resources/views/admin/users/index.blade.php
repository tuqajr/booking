@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('title')
    Admin : Users Management
@endsection

@section('content')
                  {{-- Table --}}
              <div class="container m-5" style="max-height: 100%">
                <div class="my-3">
                  <h3>
                    <i class="bi bi-people"></i>
                    Users Management
                  </h3>
                </div>
                
                {{-- Create user & Modal--}}
                <div class="my-2">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                    <i class="bi bi-person-plus"></i>
                    New User
                  </button>
                </div>
                {{-- include the modal body --}}
                @include('admin.users.create')
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center alertDelete" role="alert">
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

                <!-- User Table -->
                <div id="userTable" style="display: none;">
                  @include('admin.users.table') <!-- Dynamically load table -->
                </div>

                @endsection
<script src="/js/admin.js"></script>