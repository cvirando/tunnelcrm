@extends('layouts.app')

@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
            Settings
        </div>
        <h2 class="page-title">
            Performances
        </h2>
    </div>
@endsection

@section('pagelinks')
@endsection

@section('content')
<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Here you can control your website behaviors such as caches, debug mode, security key and more...</p>
                                <p><i class="text-warning fas fa-exclamation-triangle"></i> Remember some of these actions might cause temporary issue in your websites action, best is to work on this options when your site has minimum entrance or traffic.</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6 mt-2">
                                <div class="card">
                                    <div class="card-status-top bg-primary"></div>
                                    <div class="card-body">
                                        <div class="card-title"><h4>Performances</h4></div>
                                        <p class="text-muted"><small>This settings affect your website behavior immediately, use them with caution.</small></p>
                                        <form method="POST" action="{{route('debugMode')}}">
                                            @csrf
                                            @method('POST')
                                            @foreach($contents as $tit => $envcontent)
                                                <label class="mt-2" for="{{$tit}}">{{$tit}}</label>
                                                @if($tit == 'APP_DEBUG')
                                                <select name="{{$tit}}" id="{{$tit}}" class="form-control select">
                                                    <option value="true" {{ $tit == 'true' ? 'selected' : '' }}>True</option>
                                                    <option value="false" {{ $tit == 'false' ? 'selected' : '' }}>False</option>
                                                </select>
                                                @elseif($tit == 'APP_ENV')
                                                <select name="{{$tit}}" id="{{$tit}}" class="form-control select">
                                                    <option value="local"  {{ $tit == 'local' ? 'selected' : '' }}>Local</option>
                                                    <option value="production"  {{ $tit == 'production' ? 'selected' : '' }}>Production</option>
                                                </select>
                                                @elseif($tit == 'MAIL_MAILER')
                                                <select name="{{$tit}}" id="{{$tit}}" class="form-control select">
                                                    <option value="smtp"  {{ $tit == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                                    <option value="sendmail"  {{ $tit == 'sendmail' ? 'selected' : '' }}>SENDMAIL</option>
                                                    <option value="mail" {{ $tit == 'mail' ? 'selected' : '' }}>MAIL</option>
                                                </select>
                                                @elseif($tit == 'MAIL_ENCRYPTION')
                                                <select name="{{$tit}}" id="{{$tit}}" class="form-control select">
                                                    <option value="tls"  {{ $tit == 'tls' ? 'selected' : '' }}>TLS</option>
                                                    <option value="ssl" {{ $tit == 'ssl' ? 'selected' : '' }}>SSL</option>
                                                </select>
                                                @elseif($tit == 'APP_KEY')
                                                <code>{{$envcontent}}</code> <br>
                                                @elseif($tit == 'SESSION_LIFETIME')
                                                <label for="SESSION_LIFETIME">Session Life</label>
                                                <div class="input-group">
                                                    <input type="text" name="{{$tit}}" value="{{$envcontent}}" class="form-control">
                                                    <span class="input-group-addon">Sec</span>
                                                </div>
                                                @else
                                                <input type="text" name="{{$tit}}" value="{{$envcontent}}" class="form-control">
                                                @endif
                                            @endforeach
                                            <button class="btn btn-primary mt-4" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <div class="card">
                                                    <div class="card-status-top bg-success"></div>
                                                    <div class="card-body">
                                                        <div class="card-title"><h4>Send Test Email</h4></div>
                                                        <p class="text-muted"><small>Send test mail to test your mailing settings.</small></p>
                                                        <form method="POST" action="{{route('SendTestMAil')}}">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="input-group mb-2">
                                                                <input type="email" class="form-control" name="email" id="email" placeholder="jane.doe@example.com" required>
                                                                <button class="btn btn-primary" type="submit">Send</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="card">
                                                    <div class="card-status-top bg-yellow"></div>
                                                    <div class="card-body">
                                                        <div class="card-title"><h4>Clear caches</h4></div>
                                                        <p class="text-muted"><small>You and your users might be logout.</small></p>
                                                        <form method="POST" action="{{route('clearCaches')}}">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-danger">Clear Now</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <div class="card">
                                            <div class="card-status-top bg-red"></div>
                                            <div class="card-body">
                                                <div class="card-title"><h4>Maintenance Mode</h4></div>
                                                <p class="text-muted"><small>Website will be unavailable to everyone except admins with bypass code.</small></p>
                                                <form method="POST" action="{{route('MaintenanceMode')}}">
                                                    @csrf
                                                    @method('POST')
                                                    <label>Bypass Secret String</label>
                                                    <textarea class="form-control" name="maintenance_message" placeholder="This string allow you to bypass maintanance page and access your panel." required></textarea>

                                                    <div class="mt-3">
                                                        <label class="form-check">
                                                        <input class="form-check-input" type="radio" id="iradio" name="maintenance"  {{file_exists(storage_path().'/framework/down') ? 'checked="checked"' : ''}} value="active">
                                                        <span class="form-check-label">Maintenance</span>
                                                        </label>

                                                        <label class="form-check">
                                                        <input class="form-check-input" type="radio" id="iradio" name="maintenance" {{!file_exists(storage_path().'/framework/down') ? 'checked="checked"' : ''}} value="inactive">
                                                        <span class="form-check-label">LIVE</span>
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
@endsection

@section('scripts')
<script src="{{ asset('css/admin/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
@endsection
