@extends('layouts.app')

@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
        Overview
        </div>
        <h2 class="page-title">
        Dashboard
        </h2>
    </div>
@endsection

@section('pagelinks')
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card card-md">
                <div class="card-stamp card-stamp-lg">
                <div class="card-stamp-icon bg-primary">
                    <!-- Download SVG icon from https://tabler-icons.io/i/ghost -->
                    <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
                </div>
                </div>
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-10">
                    <h3 class="h1">Manage Modules</h3>
                    <div class="markdown text-muted">
                        Click on link below to manage your modules.
                    </div>
                    <div class="mt-3">
                        <a href="{{route('modules')}}" class="btn btn-primary">Install Modules</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h4>Active Modules</h4>
            <div class="row justify-content-start">
                @forelse ($modules as $module)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header">
                          <div>
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url('{{url(Config::get($module->getLowerName().'.image'))}}')"></span>
                              </div>
                              <div class="col">
                                <div class="card-title">{{$module}}</div>
                              </div>
                            </div>
                          </div>
                          <div class="card-actions">

                            <a href="{{url('/')}}/{{$module->getLowerName()}}" class="btn btn-success">
                                <svg xmlns="https://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-click" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5"></path>
                                    <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5"></path>
                                    <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5"></path>
                                    <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47"></path>
                                    <path d="M5 3l-1 -1"></path>
                                    <path d="M4 7h-1"></path>
                                    <path d="M14 3l1 -1"></path>
                                    <path d="M15 6h1"></path>
                                </svg>
                              Open
                            </a>
                          </div>
                        </div>
                        <div class="card-body">
                            {{$module->get('description')}}
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <a href="#">More information</a>
                              </div>
                              <div class="col-auto ms-auto">
                                <a href="{{route('disableModule', $module->getName())}}" class="text-decoration-none link-danger">
                                    <svg xmlns="https://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-letter-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                        <path d="M10 8l4 8"></path>
                                        <path d="M10 16l4 -8"></path>
                                    </svg>
                                    Disable
                                  </a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            You don't have any active module! try to install some! <a href="{{route('modules')}}" class="btn btn-primary btn-sm">Install Modules</a>
                        </p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
