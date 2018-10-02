@extends('layouts.app')

@section('content')
<section>
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <article>
                    <hgroup>
                        <h1 class="text-uppercase">Login to {company} benefits portal</h1>
                        <h2>Welcome to the Childcare site</h2>
                    </hgroup>

                    <p>Please be aware this is a demo page for use while developing the front end, this page will not exist on the finished site and will instead go directly to the relevent home page.</p>
                    <p>
                        View the HTML for the following flows below:
                    </p>
                </article>    
                <div class="temporary-delete-once-done">

                    <b>Public</b>
                    <small>Access without login</small>
                    <ul class="list-unstyled">
                        <li>
                            <a href="general/" title="Public landing page">Landing</a>
                        </li>
                        <li>
                            <a href="general/register-employer" title="Register employer link">Register Employer</a>
                        </li>
                    </ul>

                    <b>Employer</b>
                    <ul class="list-unstyled">
                        <li>
                            <a href="employer/home" title="Employer home">Home</a>
                        </li>
                        <li>
                            <a href="employer/employee-list" title="Employer employee list">Employees</a>
                        </li>
                        <li>
                            <a href="employer/order-history" title="Employer order history">Orders</a>
                        </li>
                        <li>
                            <a href="employer/sales-invoices" title="Employer sales invoices list">Invoices</a>
                        </li>
                        <li>
                            <a href="employer/management-report" title="Employer management report">Report</a>
                        </li>
                        <li>
                            <a href="employer/my-preferences" title="Employer management report">Employer Settings/Edit Details</a>
                        </li>
                        <li>
                            <a href="employer/employee-details" title="Employer employee details page">Employee Details</a>
                        </li>
                        <li>
                            <a href="employer/place-order" title="Employer place an order form">Place Order</a>
                        </li>
                        <li>
                            <a href="employer/employee-invitation" title="Employer place an order form">Invite Employees</a>
                        </li>

                    </ul>
                    <hr>
                    <b>Employee</b>
                    <ul class="list-unstyled">
                         <li>
                            <a href="parent/home" title="Parent home">Parent Home</a>
                        </li>
                            <li>
                            <a href="parent/my-family" title="Parent home">My Family</a>
                        </li>
                                     <li>
                            <a href="parent/my-child-care" title="Parent home">My Childcare Providers</a>
                        </li>
                    </ul>
                    <hr>
                    <b>Provider / Childcarer</b>
                    <ul class="list-unstyled">
                        
                    </ul>
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

@endsection
