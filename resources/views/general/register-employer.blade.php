@extends('layouts.app')

@section('squiggle-box')
<div class="container">


    <div class="cs-contrast-box text-left">
        <h1 class="cs text-center">Employer Registration</h1>
        @include('forms.register-employer')
    </div>

</div>


@endsection


@section('additional_style')
    {{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
    {{-- Add custom javascript links here --}}
    <script>

        /**
         * Transfers Main contact details to invoice
         */
        jQuery('#main_id_invoice').on('change', function (e) {

            var el = this,
                sourceSet = jQuery('#main_set')
                targetSet = jQuery('#invoice_set');;

            if( ! el.checked) {
              sourceSet.find('*[name]').each(function (k,v) {
                  var value = v.value,
                      name = v.name,
                      targetName = '*[name="'+name.replace('main', 'inv')+'"]';
                      jQuery(targetName).val('');
              });
              return false;
            }

            sourceSet.find('*[name]').each(function (k,v) {
                var value = v.value,
                    name = v.name,
                    targetName = '*[name="'+name.replace('main', 'inv')+'"]';
                    jQuery(targetName).val(value);
            });

        });

    </script>
@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection
