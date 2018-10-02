<form class="form" role="form" method="POST" action="{{ route('store-parent') }}">
  <div class="row">

    <div class="col-md-12">
      <section>
        <fieldset><legend>Account Details</legend>

          <div class="form-group{{ $errors->has('account_email') ? ' has-error' : '' }}">
            <label for="account_email" class="control-label">E-Mail</label>
            <input id="account_email" type="email" class="form-control" name="account_email" value="{{ old('account_email') }}">
            @if ($errors->has('email'))
              <div class="help-block cs-error">{{ $errors->first('email') }}</div>
            @endif
          </div>

          <div class="form-group{{ $errors->has('account_password') ? ' has-error' : '' }}">
            <label for="account_password" class="control-label">Account Password</label>
            <input id="account_password" type="password" class="form-control" name="account_password" value="{{ old('account_password') }}">
            @if ($errors->has('account_password'))
              <div class="help-block cs-error">{!! $errors->first('account_password') !!}</div>
            @endif
          </div>

          <div class="form-group{{ $errors->has('account_password_confirm') ? ' has-error' : '' }}">
            <label for="account_password_confirm" class="control-label">Confirm Password</label>
            <input id="account_password_confirm" type="password" class="form-control" name="account_password_confirm" value="{{ old('account_password_confirm') }}">
            @if ($errors->has('account_password_confirm'))
              <div class="help-block cs-error">{{ $errors->first('account_password_confirm') }}</div>
            @endif
          </div>

          <div class="form-group{{ $errors->has('account_code') ? ' has-error' : '' }}">
            <label for="account_code" class="control-label">Registration Code</label>
            <input id="account_code" type="text" class="form-control" name="account_code" value="{{app('request')->input('account_code') }}">
            @if ($errors->has('account_code'))
              <div class="help-block cs-error">{{ $errors->first('account_code') }}</div>
            @endif
          </div>

        </fieldset>
      </section>
    </div>

    <div class="col-md-12">
      <section>
        <fieldset id="parent_set"><legend>Parent Details</legend>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="control-label ">Title</label>
                <div class="js-title-select input-group">
                  <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">Select</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a class="js-title" href="#" data-value="Mr">Mr</a></li>
                      <li><a class="js-title" href="#" data-value="Mrs">Mrs</a></li>
                      <li><a class="js-title" href="#" data-value="Miss">Miss</a></li>
                      <li><a class="js-title" href="#" data-value="Ms">Ms</a></li>
                    </ul>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
                @if ($errors->has('title'))
                  <div class="help-block cs-error">{{ $errors->first('title') }}</div>
                @endif
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="control-label">First Name</label>
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                @if ($errors->has('first_name'))
                  <div class="help-block cs-error">{{ $errors->first('first_name') }}</div>
                @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="control-label">Last Name</label>
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                @if ($errors->has('last_name'))
                  <div class="help-block cs-error">{{ $errors->first('last_name') }}</div>
                @endif
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                <label for="phone1" class="control-label">Phone Number</label>
                <input id="phone1" type="text" class="form-control" name="phone1" value="{{ old('phone1') }}">
                @if ($errors->has('phone1'))
                  <div class="help-block cs-error">{{ $errors->first('phone1') }}</div>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                <label for="phone2" class="control-label">Alternative Phone Number</label>
                <input id="phone2" type="text" class="form-control" name="phone2" value="{{ old('phone2') }}">
                @if ($errors->has('phone2'))
                  <div class="help-block cs-error">{{ $errors->first('phone2') }}</div>
                @endif
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                <label for="date_of_birth" class="control-label">Date of Birth</label>
                <input id="date_of_birth" type="text" class="form-control datepicker" name="date_of_birth" value="{{ old('date_of_birth') }}">
                @if ($errors->has('date_of_birth'))
                  <div class="help-block cs-error">{{ $errors->first('date_of_birth') }}</div>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('ni_number') ? ' has-error' : '' }}">
                <label for="ni_number" class="control-label">NI Number</label>
                <input id="ni_number" type="text" class="form-control" name="ni_number" value="{{ old('ni_number') }}">
                @if ($errors->has('ni_number'))
                  <div class="help-block cs-error">{{ $errors->first('ni_number') }}</div>
                @endif
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                <label for="address1" class="control-label">Address Line 1</label>
                <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}">
                @if ($errors->has('address1'))
                  <div class="help-block cs-error">{{ $errors->first('address1') }}</div>
                @endif
              </div>

              <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                <label for="address2" class="control-label">Address Line 2</label>
                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}">
                @if ($errors->has('address2'))
                  <div class="help-block cs-error">{{ $errors->first('address2') }}</div>
                @endif
              </div>

            </div>
            <div class="col-md-6">

              <div class="form-group{{ $errors->has('post_town') ? ' has-error' : '' }}">
                <label for="post_town" class="control-label">Town/City</label>
                <input id="post_town" type="text" class="form-control" name="post_town" value="{{ old('post_town') }}">
                @if ($errors->has('post_town'))
                  <div class="help-block cs-error">{{ $errors->first('post_town') }}</div>
                @endif
              </div>

              <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                <label for="county" class="control-label">County</label>
                <input id="county" type="text" class="form-control" name="county" value="{{ old('county') }}">
                @if ($errors->has('county'))
                  <div class="help-block cs-error">{{ $errors->first('county') }}</div>
                @endif
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">

              <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                <label for="post_code" class="control-label">Post Code</label>
                <input id="post_code" type="text" class="form-control" name="post_code" value="{{ old('post_code') }}">
                @if ($errors->has('post_code'))
                  <div class="help-block cs-error">{{ $errors->first('post_code') }}</div>
                @endif
              </div>
            </div>
          </div>

        </fieldset>
      </section>
    </div>

  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="checkbox{{ $errors->has('marketing_agreed') ? ' has-error' : '' }}">
            <label>
              <input type="checkbox" id="marketing_agreed" name="marketing_agreed">
              I would like to receive the Newsletter
            </label>
          </div>
        </div>
      </div>



      <div class="form-group text-right">
        <button class="btn btn-default btn-lg" type="submit">Submit</button>
      </div>

    </div>

  </div>
</form>
