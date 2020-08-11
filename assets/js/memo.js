$(document).ready( function () 
{
    $('#tableuser').DataTable(
        {
            "order": [[ 0, "desc" ]]
        });
    }
);
$(document).ready( function () {
    $('#table').DataTable();
} );
$(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();
});
$(document).ready(function() {
	//init DateTimePickers
    materialKit.initFormExtendedDatetimepickers();
    // Sliders Init
    materialKit.initSliders();
});
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'editor1' );
// Validasi tambah memo
const inputSelector = ':input[required]:visible';
function checkForm() {
  	// here, "this" is an input element
  	var isValidForm = true;
  	$(this.form).find(inputSelector).each(function() {
	    if (!this.value.trim()) {
	      	isValidForm = false;
	    }
  	});
  	$(this.form).find('.monitored-btn').prop('disabled', !isValidForm);
  	return isValidForm;
}
$('.monitored-btn').closest('form')
// in a user hacked to remove "disabled" attribute, also monitor the submit event
.submit(function() {
// launch checkForm for the first encountered input,
// use its return value to prevent default if form is not valid
return checkForm.apply($(this).find(':input')[0]);
})
.find(inputSelector).keyup(checkForm).keyup();