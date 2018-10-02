@extends('layouts.employer')

@section('content')
<section>
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Employee Invitations <small>(Your invitation code is {{ $invitation_code }})</small></h1>

            @if (session('success_message'))
                <div class="col-md-12 alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif

                <p>Please use any of the methods below to invite employees to join the scheme.</p>

            </div>


            <div class="col-sm-4">
                <div class="cs-block">
                    <a href="#email_invite" title="Send employee invitation by email." data-toggle="modal" data-target="#email_invite">
                        By Email
                        <span class="icon glyphicon glyphicon-envelope"></span>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="email_invite" tabindex="-1" role="dialog" aria-labelledby="email_inviteLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="email_inviteLabel">Invite Employee via Email</h4>
                                </div>
                                <form class="form" role="form" method="POST" action="{{ url('/employer/send-invitation') }}">
                                <div class="modal-body">


                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="control-label">E-Mail Address</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Send Invite">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="cs-block">
                    <a href="#csv_invite" title="Send employee invitation by csv upload." data-toggle="modal" data-target="#csv_invite">
                        By CSV Upload
                        <span class="icon glyphicon glyphicon-open"></span>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="csv_invite" tabindex="-1" role="dialog" aria-labelledby="csv_inviteLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="csv_inviteLabel">Invite multiple Employee by Uploading a CSV file.<br>
                                    <p>To invite more than one employee to join the scheme, simply upload the list of email addressed from CSV (.csv) file</p>
                                    </h4>
                                </div>
                                <div class="modal-body">

                              <form class="form" role="form" method="POST" action="{{ url('employer/csv-invite-upload') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="csvInputFile">File input</label>
                                            <input type="file" name="file" id="csvInputFile">
                                            <p class="help-block">Upload a csv.</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" id="csvInputFileSubmit" class="btn btn-lg btn-default" value="Send Invites">
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="cs-block">
                    <a href="#link_invite" title="Send employee invitation by link." data-toggle="modal" data-target="#link_invite">
                        By Link
                        <span class="icon glyphicon glyphicon-link"></span>
                    </a>

                   <!-- Modal -->
                    <div class="modal fade" id="link_invite" tabindex="-1" role="dialog" aria-labelledby="link_inviteLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="link_inviteLabel">Copy this link and send it to your employee.<br>
                                    </h4>
                                </div>
                                <div class="modal-body">

                                  <a class="lead">{{url('register-parent?account_code='.$invitation_code)}}</a>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@section('additional_style')
        {{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
    {{-- Add custom javascript links here --}}
@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection
