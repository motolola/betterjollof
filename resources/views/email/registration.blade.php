@extends('email.layouts.default')

@section('top_logo')
    {{-- img 200x50 --}}
    {{-- <img src="http://placehold.it/200x50" width="200" height="50" alt="alt_text" border="0"> --}}
    WELCOME TO {{ env('SITE_NAME') }}!
@endsection

@section('banner_logo')
    {{-- img 600x300 --}}
    <img src="{{ URL::asset('img/bkgs/email/suya-bg.jpg') }}" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px;">
@endsection

@section('content_block')
    Hi <b></b>{{$firstname.' '.$surname}},<br><br>
    Thanks for your registration.
    You are now opened to a new world of food experience from people like yourself<br><br>
    {{env('SITE_NAME')}} was created to connect local food lovers and enthusiasts.
    We hope you have a good experience, and you can always contact us if you require any question and we be
    very delighted to hear from you.
    Email Address: {{ $email }}<br><br>
    Username: {{$username}}
@endsection

@section('call_to_action')
    <br><br>
    <!-- Button : Begin -->
    <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
        <tr>
            <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                <a href="{{ url('/') }}" style="background: #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
                    &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff">Go To Site</span>&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </td>
        </tr>
    </table>
    <!-- Button : END -->
    <br>
@endsection

@section('footer_note')
    If your query is urgent please contact us by phone on {{ env('CONTACT_PHONE') }}
@endsection
