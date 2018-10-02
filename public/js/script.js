jQuery(document).ready(function () {

    // enable datepicker
    $('.datepicker').datepicker({
        weekDayFormat: 'narrow',
        inputFormat: ["d/M/y"],
        outputFormat: 'dd/MM/yyyy'
    });

  $('[data-toggle="tooltip"]').tooltip();
  $('abbr').tooltip();// enable tooltips on  abbr as it's better for accessability

    jQuery('input[required], input[required=required], input[required=true], input:required').prev('label').each(function () {
        var el = jQuery(this);
        var text = jQuery(this).html();
        el.html(text + ' *');
    });


    jQuery('.panel-collapse').on('show.bs.collapse hide.bs.collapse', function(e) {
      jQuery(this).siblings('.panel-heading').toggleClass('dropdown dropup');
    });

    jQuery('.js-title-select').on('click', 'a.js-title', function(e) {
            e.preventDefault();
            var title = jQuery(this).data('value'),
            target = jQuery(this).parents('.input-group.js-title-select').find('input[type=text]').first();
            target.val(title);
    });

});

jQuery('.submission-check').on('click submit', function (e) {
	var type = e.type; // click or submit

	if( ! confirm('Are you sure?')) return e.preventDefault();

	if(type === 'click') {
		// handle link submittions
	} else if(type === 'submit') {
		//handle delete submission
	}
});

jQuery('#main_id_invoice').on('change', function (e) {

    var el = this,
        sourceSet = jQuery('#main_set');

    if( ! el.checked) return false;

    sourceSet.find('*[name]').each(function (k,v) {
        var value = v.value,
            name = v.name,
            targetName = '#' + name.replace('main', 'invoice');

            console.log(name);
            jQuery(targetName).val(value);
    });
});
