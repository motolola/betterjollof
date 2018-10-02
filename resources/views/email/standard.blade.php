@extends('email.layouts.default')

@section('top_logo')
  {{-- img 200x50 --}}
  {{-- <img src="http://placehold.it/200x50" width="200" height="50" alt="alt_text" border="0"> --}}
  BETTER JOLLOF!
@endsection

@section('banner_logo')
  {{-- img 600x300 --}}
  <img src="{{ URL::asset('img/bkgs/main.jpg') }}" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px;">
@endsection

@section('content_block')
  Thank you for your query <b>{{ $email['name'] or 'User' }}</b>.<br><br>
  You submitted the following:<br><br>
  Email Address: {{ $email['email'] }}<br><br>
  Message:<br><br>
  '<i>{{ $email['message'] }}</i>'
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
  Please be aware we endeaver to reply to all queries where possible, but please be aware that due to the value of emails we may ntot always be able to respond. If your query is urgent please contact us by phone on {{ env('CONTACT_PHONE') }} {{ env('CONTACT_OPEN') }}.
@endsection
