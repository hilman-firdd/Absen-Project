<script type="text/javascript" src="assets/js/lib/moment/moment-with-locales.min.js"></script>
<script type="text/javascript" src="assets/js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	
<script src="assets/js/lib/jquery/jquery.min.js"></script>
<script src="assets/js/lib/tether/tether.min.js"></script>
<script src="assets/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>

<script src="./../assets/js/lib/summernote/summernote.min.js"></script>
<script src="assets/js/lib/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/js/lib/daterangepicker/daterangepicker.js"></script>
<script src="assets/js/lib/bootstrap-table/bootstrap-table.js"></script>
<script src="assets/js/lib/html5-form-validation/jquery.validation.min.js"></script>
<script src="assets/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
	
	  <script>
		
	</script>


		<script>
			$(document).ready(function() {
			
			
			$('.swal-btn-warning').click(function(e){
				e.preventDefault();
				swal({
							title: "Warning!",
							text: "Hanya admin yang dapat menghapus data ini!",
							type: "warning",
							showCancelButton: true,
							cancelButtonClass: "btn-default",
							confirmButtonClass: "btn-warning",
							confirmButtonText: "Next",
							closeOnConfirm: false
						},
						function(){
							swal({
								title: "Finish!",
								text: "Silahkan hubungi admin untuk melakukan hal ini!",
								type: "success",
								confirmButtonClass: "btn-success"
							});
						});
			});

			
		});
		
		
		$(function() {
			function cb(start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
			cb(moment().subtract(29, 'days'), moment());
			$('#daterange').daterangepicker({
				"timePicker": true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				"linkedCalendars": false,
				"autoUpdateInput": false,
				"alwaysShowCalendars": true,
				"showWeekNumbers": true,
				"showDropdowns": true,
				"showISOWeekNumbers": true
			});

			$('#daterange2').daterangepicker();

			$('#daterange3').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});
			
			$('#daterange4').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});

			$('#daterange').on('show.daterangepicker', function(ev, picker) {
				/*$('.daterangepicker select').selectpicker({
					size: 10
				});*/
			});
		
		
			/* ==========================================================================
			 Validation
			 ========================================================================== */
			$('#form-absen').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});
			
			$('#form-signin_v1').validate({
				submit: {
					settings: {
						inputContainer: '.form-group'
					}
				}
			});
			
			$('#form-insert').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});

			$('#form-signin_v2').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-error-text-block',
						display: 'block',
						insertion: 'prepend'
					}
				}
			});

			$('#form-signup_v1').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});

			$('#form-signup_v2').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});
		});
	</script>

<script src="assets/js/app.js"></script>
</body>
</html>
