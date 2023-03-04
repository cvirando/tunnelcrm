@extends('layouts.app')


@section('breadcrumbs')
    <div class="col">
        <h2 class="page-title">
            Modules
        </h2>
    </div>
@endsection

@section('pagelinks')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="float-start">Install Modules</h5>
                </div>
            </div>
        </div>

        @forelse ($modules as $module)
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row card-text">
                        <div class="col-md-3">
                            <img width="70" height="70" src="{{$module['image']}}" alt="{{$module['name']}}">
                        </div>
                        <div class="col-md-9">
                            <h5 class="card-title">{{$module['name']}}</h5>
                            <p>{{$module['description']}}</p>
                            <p class="text-muted fw-lighter fst-italic">Developer: {{$module['developer']}}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-2">
                                <span class="float-start">
                                    @if(in_array($module['name'], $aDis) || in_array($module['name'], $aEnb))
                                    @else
                                        @if($module['premium'])
                                            {{$module['price']}}
                                        @else
                                        <a target="_blank" rel="noopener nofollow" href="{{$module['repo']}}" class="btn btn-sm btn-link">Learn more</a>
                                        @endif
                                    @endif
                                </span>
                                <span class="float-end">
                                    @if(in_array($module['name'], $aDis))
                                        <a href="{{route('enableModule', strtolower($module['name']))}}" class="btn btn-sm btn-pill btn-success">Enable</a>
                                    @elseif(in_array($module['name'], $aEnb))
                                        <a href="{{route('disableModule', strtolower($module['name']))}}" class="btn btn-sm btn-pill btn-danger">Disable</a>
                                    @else
                                        @if($module['premium'])
                                            <button type="button" class="btn btn-outline-dark btn-pill w-100 btn-sm" data-bs-toggle="modal" data-bs-target="#buy-{{$module['name']}}">
                                                Buy Now
                                            </button>
                                            <div class="modal modal-blur fade" id="buy-{{$module['name']}}" tabindex="-1" aria-labelledby="buy-{{$module['name']}}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="buy-{{$module['name']}}Label">Buy {{$module['name']}} Module</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2 mr-3">
                                                                <img width="70" height="70" src="{{$module['image']}}" alt="{{$module['name']}}">
                                                            </div>
                                                            <div class="col-10 ml-3">
                                                                <p>{{$module['description']}}</p>

                                                                <p><span class="badge bg-success">{{$module['price']}}</span> | <mark>Developer: {{$module['developer']}}</mark></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5><b>Purchase: <span class="text-red">One Time Payment</span></b></h5>
                                                        <p>
                                                            Please transfer module fee ({{$module['price']}}) to our <a target="_blank" rel="noopener nofollow" href="https://paypal.me/rnicjoo">PayPal</a> and contact us at <code>purchase@tunnelcrm.com</code> with your transfer id.
                                                        </p>
                                                        <p>
                                                            We will send your module to your inbox.
                                                        </p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        @else
                                            <button type="button" class="btn btn-outline-primary btn-pill btn-sm" data-bs-toggle="modal" data-bs-target="#install-{{$module['name']}}">
                                                Install
                                            </button>
                                            <div class="modal modal-blur fade" id="install-{{$module['name']}}" tabindex="-1" aria-labelledby="install-{{$module['name']}}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="install-{{$module['name']}}Label">Install {{$module['name']}} Module</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2 mr-3">
                                                                <img width="70" height="70" src="{{$module['image']}}" alt="{{$module['name']}}">
                                                            </div>
                                                            <div class="col-10 ml-3">
                                                                <p>{{$module['description']}}</p>

                                                                <p><a target="_blank" rel="noopener nofollow" href="{{$module['repo']}}">Repo</a> | <mark>Developer: {{$module['developer']}}</mark></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h6><b>Installation:</b></h6>
                                                        <p>To install <b>{{$module['name']}}</b> module, please run following command in your website <u>root folder</u> by using <u>terminal</u>.</p>
                                                        <p>
                                                            <pre style="white-space: normal;background: #8080803d;
                                                            padding: 1rem;
                                                            border-radius: 1rem;"><code>
                                                                @foreach ($module['commands'] as $key => $command)
                                                                <p>{{$key+1}}. {!!$command!!}</p>
                                                                @endforeach
                                                            </code></pre>
                                                        </p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    You've already installed all modules.
                </p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
