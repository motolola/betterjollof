<form class="form" role="form" method="POST" action="{{url('user/provider-registration')}}">
    <div class="row">

        <div class="col-md-6">

            <fieldset><legend>Company Details</legend>

                <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                    <label for="company_name" class="control-label">Company Name</label>
                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                </div>

                <div class="form-group{{ $errors->has('company_group') ? ' has-error' : '' }}">
                    <label for="company_group" class="control-label">Group Name</label>
                    <input id="company_group" type="text" class="form-control" name="company_group" value="{{ old('company_group') }}">
                </div>

                <div class="form-group{{ $errors->has('company_industry') ? ' has-error' : '' }}">
                    <label for="company_industry" class="control-label">Industry Sector</label>
                    <select id="company_industry" class="form-control" name="company_industry">
                        <option value="{{ old('company_industry') }}">{{ old('company_industry') }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="row">

                    <div class="col-md-6{{ $errors->has('company_is_private') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="company_is_private" class="control-label">Public or Private</label>
                            <select id="company_is_private" class="form-control" name="company_is_private">
                                <option value="{{ old('company_is_private') }}">{{ old('company_is_private') }}</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('company_employee_count') ? ' has-error' : '' }}">
                            <label for="company_employee_count" class="control-label">Number of Employees</label>
                            <input id="company_employee_count" type="number" min="0" class="form-control" name="company_employee_count" value="{{ old('company_employee_count') }}">
                        </div>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <section>
                <fieldset id="childcarer_set"><legend>Childcarer Details</legend>

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
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
                                <label for="job_title" class="control-label">Job Title</label>
                                <input id="job_title" type="text" class="form-control" name="job_title" value="{{ old('job_title') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="control-label">Phone Number</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="control-label">Address Line 1</label>
                                <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}">
                            </div>

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address2" class="control-label">Address Line 2</label>
                                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                                <label for="town" class="control-label">Town/City</label>
                                <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}">
                            </div>

                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label for="county" class="control-label">County</label>
                                <input id="county" type="text" class="form-control" name="county" value="{{ old('county') }}">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                                <label for="post_code" class="control-label">Postcode</label>
                                <div class="input-group">
                                    <input id="post_code" type="text" class="form-control" name="post_code" value="{{ old('post_code') }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('childcarer_industry') ? ' has-error' : '' }}">
                                <label for="childcarer_industry" class="control-label">Childcarer Type</label>
                                <select id="childcarer_industry" class="form-control" name="childcarer_industry">
                                    <option value="{{ old('childcarer_industry') }}">{{ old('childcarer_industry') }}</option>
                                    @foreach($childcarer_types as $key=>$type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                                <label for="bank_name" class="control-label">Bank Name</label>
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('sort_code') ? ' has-error' : '' }}">
                                <label for="sort_code" class="control-label">Sort Code</label>
                                <input id="sort_code" type="text" class="form-control" name="sort_code" value="{{ old('sort_code') }}">
                            </div>

                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                        <label for="account_number" class="control-label">Account Number</label>
                        <input id="account_number" type="text" class="form-control" name="account_number" value="{{ old('account_number') }}">
                    </div>


                    <div class="form-group{{ $errors->has('roll_number') ? ' has-error' : '' }}">
                        <label for="roll_number" class="control-label">Roll Numberr</label>
                        <input id="roll_number" type="text" class="form-control" name="roll_number" value="{{ old('roll_number') }}">
                    </div>

                    <div class="form-group{{ $errors->has('childcarer_approval_urn') ? ' has-error' : '' }}">
                        <label for="childcarer_approval_urn" class="control-label">Approval Urn</label>
                        <input id="childcarer_approval_urn" type="text" class="form-control" name="childcarer_approval_urn" value="{{ old('childcarer_approval_urn') }}">
                    </div>

                </fieldset>
            </section>
        </div>

    </div>
    <div class="row">

        <div class="col-md-12">


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
