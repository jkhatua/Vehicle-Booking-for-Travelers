function getalldata(){
	var corporate = $('#corporate').val();
	var month = $('#month').val();
	var name = "get_corporate_data";
	 $.ajax({
		url:"select_all_dataof_corporate.php",
		type:"post",
		data:{corporate:corporate,month:month,name:name},
		success:function(data){
			//alert(data);
			var a = JSON.parse(data);
			//alert(a.km);
			if(data=="0"){
				$('#total_km_cover').val(0);
			}else{
				$('#total_km_cover').val(a.km);
				var name1 = "get_corporate_data1";
	$.ajax({
		url:"select_all_dataof_corporate.php",
		type:"post",
		data:{corporate:corporate,month:month,name1:name1},
		success:function(data){
			//alert($('#total_km_cover').val());
			var b = JSON.parse(data);
			$('#refno').val(b.ref_no);
			$('#gstno').val(b.gst_no);
			$('#saccode').val(b.sac_code);
			$('#km_cover_liter').val(b.km_cover_in_one_litre);
			$('#fuel_rate').val(b.fuel_price);
			$('#km_covers_engine_oil').val(b.km_covers_onelitter_engineoil);
			$('#engine_oil_rate').val(b.engine_oil_price);
			var fuelconsume = Math.round(parseFloat($('#total_km_cover').val()/b.km_cover_in_one_litre));
			$('#fuel_consume').val(fuelconsume);
			$('#sub_total').val(fuelconsume*b.fuel_price);
			var engine_oil = Math.round(parseFloat($('#total_km_cover').val()/b.km_covers_onelitter_engineoil));
			$('#engine_oil_consumed').val(engine_oil);
			$('#engine_oil_charge').val(engine_oil*b.engine_oil_price);
			$('#sub_total1').val(engine_oil*b.engine_oil_price+fuelconsume*b.fuel_price);
			$('#per_day_charge').val(b.day_charge);
			//$('#grand_total').val($('#sub_total1').val()+$('#sub_total2').val());
		}
		 });
			}
			
		}
		 });
	
}
function getalldata_client(){
	var corporate = $('#corporate').val();
	var month = $('#month').val();
	var name = "get_corporate_data_client";
	 $.ajax({
		url:"select_all_dataof_corporate.php",
		type:"post",
		data:{corporate:corporate,month:month,name:name},
		success:function(data){
			//alert(data);
			var a = JSON.parse(data);
			//alert(a.km);
			if(data=="0"){
				$('#total_km_cover').val(0);
			}else{
				$('#total_km_cover').val(a.km);
				var name1 = "get_corporate_data1_client";
	$.ajax({
		url:"select_all_dataof_corporate.php",
		type:"post",
		data:{corporate:corporate,month:month,name1:name1},
		success:function(data){
			//alert(data);
			//alert($('#total_km_cover').val());
			var b = JSON.parse(data);
			$('#refno').val(b.ref_no);
			$('#gstno').val(b.gst_no);
			$('#saccode').val(b.sac_code);
			$('#km_cover_liter').val(b.km_cover_in_one_litre);
			$('#fuel_rate').val(b.fuel_price);
			$('#km_covers_engine_oil').val(b.km_covers_onelitter_engineoil);
			$('#engine_oil_rate').val(b.engine_oil_price);
			var fuelconsume = Math.round(parseFloat($('#total_km_cover').val()/b.km_cover_in_one_litre));
			$('#fuel_consume').val(fuelconsume);
			$('#sub_total').val(fuelconsume*b.fuel_price);
			var engine_oil = Math.round(parseFloat($('#total_km_cover').val()/b.km_covers_onelitter_engineoil));
			$('#engine_oil_consumed').val(engine_oil);
			$('#engine_oil_charge').val(engine_oil*b.engine_oil_price);
			$('#sub_total1').val(engine_oil*b.engine_oil_price+fuelconsume*b.fuel_price);
			$('#per_day_charge').val(b.day_charge_client);
			//$('#grand_total').val($('#sub_total1').val()+$('#sub_total2').val());
		}
		 });
			}
			
		}
		 });
}