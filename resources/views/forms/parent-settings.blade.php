<form class="form" role="form" method="POST" action="{{ url('edit-parent') }}">
    <div class="row">


        <div class="col-md-12">
            <section>
                <fieldset id="parent_set"><legend>Parent Details</legend>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label ">Title</label>
                                <div class="js-title-select input-group">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $beneficiary->title}}">
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
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') ? old('first_name') : $beneficiary->first_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') ? old('last_name') : $beneficiary->last_name }}">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                                <label for="phone1" class="control-label">Phone Number</label>
                                <input id="phone1" type="text" class="form-control" name="phone1" value="{{ old('phone1') ? old('phone1') : $beneficiary->phone1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                <label for="phone2" class="control-label">Alternative Phone Number</label>
                                <input id="phone2" type="text" class="form-control" name="phone2" value="{{ old('phone2') ? old('phone2') : $beneficiary->phone2 }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('ni_number') ? ' has-error' : '' }}">
                                <label for="ni_number" class="control-label">NI Number</label>
                                <input id="ni_number" type="ni" class="form-control" name="ni_number" value="{{ old('ni_number') ? old('ni_number') : $beneficiary->ni_number }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="control-label">Address Line 1</label>
                                <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') ? old('address1') : $beneficiary->address1 }}">
                            </div>

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address2" class="control-label">Address Line 2</label>
                                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') ? old('address2') : $beneficiary->address2 }}">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('post_town') ? ' has-error' : '' }}">
                                <label for="post_town" class="control-label">Town/City</label>
                                <input id="post_town" type="text" class="form-control" name="post_town" value="{{ old('post_town') ? old('post_town') : $beneficiary->post_town }}">
                            </div>

                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label for="county" class="control-label">County</label>
                                <input id="county" type="text" class="form-control" name="county" value="{{ old('county') ? old('county') : $beneficiary->county }}">
                            </div>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                        <label for="post_code" class="control-label">Postcode</label>                            
                        <div class="input-group">
                            <input id="post_code" type="text" class="form-control" name="post_code" value="{{ old('post_code') ? old('post_code') : $beneficiary->post_code }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div> 

                    <div class="form-group{{ $errors->has('heard_through') ? ' has-error' : '' }}">
                        <label for="heard_through" class="control-label">Where did you hear from us?</label>
                        <select id="heard_through" class="form-control" name="heard_through">
                            <option>{{ old('heard_through') ? old('heard_through') : $beneficiary->heard_through }}</option>
                            <option>Email</option>
                            <option>Advert</option>
                            <option>Newspaper</option>
                            <option>Magazine</option>
                            <option>Search Engine (e.g. Google)</option>
                        </select>
                    </div>                    

                </fieldset>
            </section>   
        </div>

        <div class="col-md-12">

            <fieldset><legend>Additional Details</legend>

                <div class="form-group{{ $errors->has('service_type') ? ' has-error' : '' }}">
                    <label for="service_type" class="control-label">Service Type</label>
                    <select id="service_type" class="form-control" name="service_type">
                        <option>{{ old('service_type') ? old('service_type') : $beneficiary->service_type}}</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div> 

                <div class="form-group{{ $errors->has('sodexo_partner') ? ' has-error' : '' }}">
                    <label for="sodexo_partner" class="control-label">Sodexo Partner</label>
                    <select id="sodexo_partner" class="form-control" name="sodexo_partner">
                        <option>{{ old('sodexo_partner') ? old('sodexo_partner') : $beneficiary->sodexo_partner }}</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>  

                <div class="form-group{{ $errors->has('childcare_promo') ? ' has-error' : '' }}">
                    <label for="childcare_promo" class="control-label">Childcare Promo</label>
                    <input id="childcare_promo" type="text" class="form-control" name="childcare_promo" value="{{ old('childcare_promo') ? old('childcare_promo') : $beneficiary->childcare_promo}}">
                </div>

                <div class="form-group{{ $errors->has('non_childcare') ? ' has-error' : '' }}">
                    <label for="non_childcare" class="control-label">Non Childcare</label>
                    <input id="non_childcare" type="text" class="form-control" name="non_childcare" value="{{ old('non_childcare') ? old('non_childcare') : $beneficiary->non_childcare}}">
                </div>     

                <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                    <label for="date_of_birth" class="control-label">Date of Birth</label>                    
                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                        <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') ? old('date_of_birth') : date('d-m-Y',strtotime($beneficiary->date_of_birth))}}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>         

            </fieldset>

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