@extends('layouts.provider')


@section('squiggle-box')

                    <div class="row">

                        <div class="col-xs-6  col-sm-4">
                            <a href="{{ route('provider-vouchers')}}" title="Link to employee list">
                                <div class="cs-outer-circle animated flipInY">
                                    <div class="cs-inner-circle">
                                        <div class="cs-circle-copy">
                                            <span class="cs-circle-value">£124.00</span>
                                            <span class="cs-circle-text">Paid on 29/07/13</span>
                                        </div>
                                        <div class="cs-circle-foot">View</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6  col-sm-4">
                            <a href="{{ route('provider-transactions') }}" title="Link to outstanding tasks">
                                <div class="cs-outer-circle animated flipInY animation-offset-1">
                                    <div class="cs-inner-circle">
                                        <div class="cs-circle-copy">
                                            <span class="cs-circle-value">0</span>
                                            <span class="cs-circle-text">Pending Payments</span>
                                        </div>
                                        <div class="cs-circle-foot">View</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6  col-sm-4">
                            <a href="{{ route('provider-parents') }}" title="Link to payroll settings">
                                <div class="cs-outer-circle animated flipInY animation-offset-2">
                                    <div class="cs-inner-circle">
                                        <div class="cs-circle-copy">
                                            <span class="cs-circle-value">{{ $account_summary->count_beneficiaries }}</span>
                                            <span class="cs-circle-text">Parents</span>
                                        </div>
                                        <div class="cs-circle-foot">View</div>
                                    </div>
                                </div>
                            </a>     
                        </div>

                    </div>

@endsection

@section('content')

<div class="cs-content">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section>
                    <h1>Lorem Ipsum</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis facere, maxime, modi repellat ducimus id quis quia. A adipisci maxime at. Blanditiis hic sint, voluptatibus unde necessitatibus dolores quidem numquam.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui reiciendis repellendus deleniti eaque, enim distinctio. Iusto asperiores nisi, labore dolores reiciendis doloremque. Cum, quidem officiis. Officiis est cupiditate quis! Explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati atque perferendis sint repudiandae aspernatur, architecto sunt. Corrupti, voluptatem, veniam fugiat, facilis unde sit omnis, eum porro eius autem ut ratione.</p>

                </section>

            </div>


            <section>
                @include('parts.offers')
            </section>


        </div>
    </div>
</div>

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
