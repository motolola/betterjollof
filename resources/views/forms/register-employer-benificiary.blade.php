<form class="form" role="form" method="POST" action="{{ url('user/client-registration') }}">
    <div class="row">

        <div class="col-md-6">
            <section>
              <fieldset><legend>Company Details</legend>

                  <div class="form-group{{ $errors->has('client.company_name') ? ' has-error' : '' }}">
                      <label for="company_name" class="control-label">Company Name</label>
                      <input id="company_name" type="text" class="form-control" name="client[company_name]" value="{{ old('client.company_name') }}">
                      @if ($errors->has('client.company_name'))
                        <div class="help-block cs-error">{{ $errors->first('client.company_name') }}</div>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('client.company_industry') ? ' has-error' : '' }}">
                      <label for="company_industry" class="control-label">Industry Sector</label>
                      <select id="company_industry" class="form-control" name="client[company_industry]">
                          <option value="">Please select</option>
                          @if($industry_sectors)
                          @foreach($industry_sectors as $sector)
                          <option {{ old('client.company_industry') == $sector->code ? 'selected' : '' }} value="{{ $sector->code}}">{{ $sector->description}}</option>
                          @endforeach
                        @endif

                          @if ($errors->has('client.company_industry'))
                            <div class="help-block cs-error">{{ $errors->first('client.company_industry') }}</div>
                          @endif
                      </select>
                  </div>

                  <div class="row">

                      <div class="col-md-6{{ $errors->has('client.company_is_private') ? ' has-error' : '' }}">
                          <div class="form-group">
                              <label for="company_is_private" class="control-label">Public or Private</label>
                              <select id="company_is_private" class="form-control" name="client[company_is_private]">
                                  <option>{{ old('client.company_is_private') }}</option>
                                  <option value="public">Public</option>
                                  <option value="private">Private</option>
                              </select>
                              @if ($errors->has('client.company_is_private'))
                                <div class="help-block cs-error">{{ $errors->first('client.company_is_private') }}</div>
                              @endif
                            </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group{{ $errors->has('client.company_employee_count') ? ' has-error' : '' }}">
                              <label for="company_employee_count" class="control-label">Number of Employees</label>
                              <input id="company_employee_count" type="number" min="0" class="form-control" name="client[company_employee_count]" value="{{ old('client.company_employee_count') }}">
                              @if ($errors->has('client.company_employee_count'))
                                <div class="help-block cs-error">{{ $errors->first('client.company_employee_count') }}</div>
                              @endif
                          </div>
                      </div>
                  </div>

              </fieldset>
            </section>
        </div>

    </div>
    <div class="row">


        <div class="col-md-6">
            <section>
              <fieldset id="main_set"><legend>Main Contact</legend>

                  <div class="row">
                      <div class="col-md-4 {{ $errors->has('client.main_title') ? ' has-error' : '' }}">
                          <label for="main_title" class="control-label">Title</label>
                          <div class="js-title-select input-group">
                              <input id="main_title" type="text" class="form-control" name="client[main_title]" value="{{ old('client.main_title') }}">
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

                          @if ($errors->has('client.main_title'))
                            <div class="help-block cs-error">{{ $errors->first('client.main_title') }}</div>
                          @endif
                      </div>

                      <div class="col-md-4 {{ $errors->has('client.main_first_name') ? ' has-error' : '' }}">
                          <div class="form-group">
                              <label for="main_first_name" class="control-label">First Name</label>
                              <input id="main_first_name" type="text" class="form-control" name="client[main_first_name]" value="{{ old('client.main_first_name') }}">
                          </div>
                          @if ($errors->has('client.main_first_name'))
                            <div class="help-block cs-error">{{ $errors->first('client.main_first_name') }}</div>
                          @endif
                      </div>

                      <div class="col-md-4">
                          <div class="form-group{{ $errors->has('client.main_last_name') ? ' has-error' : '' }}">
                              <label for="main_last_name" class="control-label">Last Name</label>
                              <input id="main_last_name" type="text" class="form-control" name="client[main_last_name]" value="{{ old('client.main_last_name') }}">
                          </div>
                          @if ($errors->has('client.main_last_name'))
                            <div class="help-block cs-error">{{ $errors->first('client.main_last_name') }}</div>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('client.main_phone') ? ' has-error' : '' }}">
                      <label for="main_phone" class="control-label">Phone Number</label>
                      <input id="main_phone" type="text" class="form-control" name="client[main_phone]" value="{{ old('client.main_phone') }}">
                      @if ($errors->has('client.main_phone'))
                        <div class="help-block cs-error">{{ $errors->first('client.main_phone') }}</div>
                      @endif
                  </div>

                  <div class="row">
                      <div class="col-md-6">

                          <div class="form-group{{ $errors->has('client.main_address1') ? ' has-error' : '' }}">
                              <label for="main_address1" class="control-label">Address Line 1</label>
                              <input id="main_address1" type="text" class="form-control" name="client[main_address1]" value="{{ old('client.main_address1') }}">
                              @if ($errors->has('client.main_address1'))
                                <div class="help-block cs-error">{{ $errors->first('client.main_address1') }}</div>
                              @endif
                          </div>
                          <div class="form-group{{ $errors->has('client.main_post_town') ? ' has-error' : '' }}">
                              <label for="main_post_town" class="control-label">Town/City</label>
                              <input id="main_post_town" type="text" class="form-control" name="client[main_post_town]" value="{{ old('client.main_post_town') }}">
                              @if ($errors->has('client.main_post_town'))
                                <div class="help-block cs-error">{{ $errors->first('client.main_post_town') }}</div>
                              @endif
                          </div>

                      </div>
                      <div class="col-md-6">

                          <div class="form-group{{ $errors->has('client.main_address2') ? ' has-error' : '' }}">
                              <label for="main_address2" class="control-label">Address Line 2</label>
                              <input id="main_address2" type="text" class="form-control" name="client[main_address2]" value="{{ old('client.main_address2') }}">
                              @if ($errors->has('client.main_address2'))
                                <div class="help-block cs-error">{{ $errors->first('client.main_address2') }}</div>
                              @endif
                          </div>
                          <div class="form-group{{ $errors->has('client.main_county') ? ' has-error' : '' }}">
                              <label for="main_county" class="control-label">County</label>
                              <input id="main_county" type="text" class="form-control" name="client[main_county]" value="{{ old('client.main_county') }}">
                              @if ($errors->has('client.main_county'))
                                <div class="help-block cs-error">{{ $errors->first('client.main_county') }}</div>
                              @endif
                          </div>

                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('client.main_post_code') ? ' has-error' : '' }}">
                      <label for="main_post_code" class="control-label">Postcode</label>
                      <div class="input-group">
                          <input id="main_post_code" type="text" class="form-control" name="client[main_post_code]" value="{{ old('client.main_post_code') }}">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                      </div><!-- /input-group -->
                      @if ($errors->has('client.main_post_code'))
                        <div class="help-block cs-error">{{ $errors->first('client.main_post_code') }}</div>
                      @endif
                  </div>

              </fieldset>
            </section>
        </div>

        <div class="col-md-6">
            <section>
              <fieldset id="invoice_set">
                  <legend class="cs-legend-prompt">Invoice Contact
                      <label class="checkbox-inline">
                          <input type="checkbox" id="main_id_invoice">Invoice is Main
                      </label>
                  </legend>

                  <div class="row">
                      <div class="col-md-4">
                          <label for="inv_title" class="control-label">Title</label>
                          <div class="js-title-select input-group{{ $errors->has('client.inv_title') ? ' has-error' : '' }}">
                              <input id="inv_title" type="text" class="form-control" name="client[inv_title]" value="{{ old('client.inv_title') }}">
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
                          @if ($errors->has('client.inv_title'))
                            <div class="help-block cs-error">{{ $errors->first('client.inv_title') }}</div>
                          @endif
                      </div>

                      <div class="col-md-4">
                          <div class="form-group{{ $errors->has('client.inv_first_name') ? ' has-error' : '' }}">
                              <label for="inv_first_name" class="control-label">First Name</label>
                              <input id="inv_first_name" type="text" class="form-control" name="client[inv_first_name]" value="{{ old('client.inv_first_name') }}">
                              @if ($errors->has('client.inv_first_name'))
                                <div class="help-block cs-error">{{ $errors->first('client.inv_first_name') }}</div>
                              @endif
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group{{ $errors->has('client.inv_last_name') ? ' has-error' : '' }}">
                              <label for="inv_last_name" class="control-label">Last Name</label>
                              <input id="inv_last_name" type="text" class="form-control" name="client[inv_last_name]" value="{{ old('client.inv_last_name') }}">
                              @if ($errors->has('client.inv_last_name'))
                                <div class="help-block cs-error">{{ $errors->first('client.inv_last_name') }}</div>
                              @endif
                          </div>
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('client.inv_phone') ? ' has-error' : '' }}">
                      <label for="inv_phone" class="control-label">Phone Number</label>
                      <input id="inv_phone" type="text" class="form-control" name="client[inv_phone]" value="{{ old('client.inv_phone') }}">
                      @if ($errors->has('client.inv_phone'))
                        <div class="help-block cs-error">{{ $errors->first('client.inv_phone') }}</div>
                      @endif
                  </div>

                  <div class="row">
                      <div class="col-md-6">

                          <div class="form-group{{ $errors->has('client.inv_address1') ? ' has-error' : '' }}">
                              <label for="inv_address1" class="control-label">Address Line 1</label>
                              <input id="inv_address1" type="text" class="form-control" name="client[inv_address1]" value="{{ old('client.inv_address1') }}">
                              @if ($errors->has('client.inv_address1'))
                                <div class="help-block cs-error">{{ $errors->first('client.inv_address1') }}</div>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('client.inv_post_town') ? ' has-error' : '' }}">
                              <label for="inv_post_town" class="control-label">Town/City</label>
                              <input id="inv_post_town" type="text" class="form-control" name="client[inv_post_town]" value="{{ old('client.inv_post_town') }}">
                              @if ($errors->has('client.inv_post_town'))
                                <div class="help-block cs-error">{{ $errors->first('client.inv_post_town') }}</div>
                              @endif
                          </div>


                      </div>

                      <div class="col-md-6">

                          <div class="form-group{{ $errors->has('client.inv_address2') ? ' has-error' : '' }}">
                              <label for="inv_address2" class="control-label">Address Line 2</label>
                              <input id="inv_address2" type="text" class="form-control" name="client[inv_address2]" value="{{ old('client.inv_address2') }}">
                              @if ($errors->has('client.inv_address2'))
                                <div class="help-block cs-error">{{ $errors->first('client.inv_address2') }}</div>
                              @endif
                          </div>



                          <div class="form-group{{ $errors->has('client.inv_county') ? ' has-error' : '' }}">
                              <label for="inv_county" class="control-label">County</label>
                              <input id="inv_county" type="text" class="form-control" name="client[inv_county]" value="{{ old('client.inv_county') }}">
                              @if ($errors->has('client.inv_county'))
                                <div class="help-block cs-error">{{ $errors->first('client.inv_county') }}</div>
                              @endif
                          </div>

                      </div>
                  </div>


                  <div class="form-group{{ $errors->has('client.inv_post_code') ? ' has-error' : '' }}">
                      <label for="inv_post_code" class="control-label">Postcode</label>
                      <div class="input-group">
                          <input id="inv_post_code" type="text" class="form-control" name="client[inv_post_code]" value="{{ old('client.inv_post_code') }}">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                      </div><!-- /input-group -->
                      @if ($errors->has('client.inv_post_code'))
                        <div class="help-block cs-error">{{ $errors->first('client.inv_post_code') }}</div>
                      @endif
                  </div>

              </fieldset>
            </section>
        </div>

    </div>
    <div class="row">

        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="checkbox{{ $errors->has('privacy_agreed') ? ' has-error' : '' }}">
                        <label>
                            <input type="checkbox" id="privacy_agreed" name="privacy_agreed">
                            I agree with the <a href="#" title="Privacy policy link">Privacy policy</a>
                        </label>
                    </div>
                    <div class="checkbox{{ $errors->has('marketing_agreed') ? ' has-error' : '' }}">
                        <label>
                            <input type="checkbox" id="marketing_agreed" name="marketing_agreed">
                            I would like to recieve the Newsletter
                        </label>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group text-right">
                <button class="btn btn-default btn-lg" type="submit">Submit</button>
            </div>

        </div>

    </div>
</form>
