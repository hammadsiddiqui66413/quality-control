<!-- EXTERNAL SCRIPTS
		============================================= -->
        {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>	
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
		<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>	
		<script src="{{asset('assets/js/modernizr.custom.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.easing.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/retina.js')}}" type="text/javascript"></script>	
		<script src="{{asset('assets/js/jquery.stellar.min.js')}}" type="text/javascript"></script>	
		<script src="{{asset('assets/js/jquery.scrollto.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.appear.js')}}" type="text/javascript"></script>	
		<script src="{{asset('assets/js/jquery.superslides.js')}}" type="text/javascript"></script>		
		<script src="{{asset('assets/js/jquery.vide.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/goalProgress.js')}}" type="text/javascript"></script>	
		<script src="{{asset('assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.mixitup.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/progress-bar.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.flexslider.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/contact-form.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/register-form.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
				
		<!-- Custom Script -->		
		<script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>	
		
								
		
		<script>
			$(document).ready(function(){
				var i=1;
		
				$("#add_row").click(function(){b=i-1;
					$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
					$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
					i++; 
				});
		
				$("#delete_row").click(function(){
					if(i>1){
					$("#addr"+(i-1)).html('');
					i--;
					}
					calc();
				});
				
				$('#tab_logic tbody').on('keyup change',function(){
					calc();
				});
		
				$('#tax').on('keyup change',function(){
					calc_total();
				});
				
				$(document).on("change",".plan",function() {	
                    var plan_id = $( this ).val();
                    var that = $(this);            
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            
                    $.ajax({
                        url: '{{ route("amount.plan") }}',
                        method: 'GET',
                        data:{ id:plan_id },
        
                        success:function(data){
                            // let old_html = $('.amount').html();
                            // $('.amount').html('');
                            // let input ='<input type="number" name="amount[]" placeholder="Unit Amount" class="form-control amount" value="'+data.amount+'">';
                            // $('.amount').html(old_html+input);
                            let elem = $(that).parent().parent().siblings('.amount');
                            $(elem).empty();
                            $(elem).append($('<input type="text" readonly name="amount[]" value="{{ old('amount[]') }}" placeholder="Unit Amount" class="form-control amount" value="'+data.amount+'">'));
                        }
                    });
				});
			
            });
		
			function calc()
			{
				$('#tab_logic tbody tr').each(function(i, element) {
					var html = $(this).html();
					if(html!='')
					{
						var qty = $(this).find('.qty').val();
						var price = $(this).find('.price').val();
						$(this).find('.total').val(qty*price);
						
						calc_total();
					}
				});
			}
		
			function calc_total()
			{
				total=0;
				$('.total').each(function() {
					total += parseInt($(this).val());
				});
				$('#sub_total').val(total.toFixed(2));
				tax_sum=total/100*$('#tax').val();
				$('#tax_amount').val(tax_sum.toFixed(2));
				$('#total_amount').val((tax_sum+total).toFixed(2));
			}
				
		
		</script>