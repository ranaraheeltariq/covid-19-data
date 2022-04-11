@extends('layouts.app')
@section('css')
@parent
@endsection

@section('content')
<h1>Gobal Cases Data</h1>

<h4>Confirmed Cases: {{number_format($globalCases['confirmed']['value'])}}</h4>
<h4>Recovered Cases: {{number_format($globalCases['recovered']['value'])}}</h4>
<h4>Deaths: {{number_format($globalCases['deaths']['value'])}}</h4>
<br />
<h1>Specific Country Data</h1>
<select name="countries" id="countries">
	<option value="">Select country...</option>
</select>
<br>
<div id="countrydata"></div>
@endsection
@section('js')
@parent
<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
            type:"GET",
            url:"{{url('countries')}}",
            dataType: 'json',
            success:function(res){
              if(res){
                $.each(res.countries,function(key,value){
                  $("#countries").append('<option value="'+value.name+'">'+value.name+'</option>');
                });
              }
            }
          });

		$('#countries').on('change', function(){
			let country = $(this).val();
			$.ajax({
            type:"GET",
            url:"{{url('country')}}/"+country,
            dataType: 'json',
            success:function(res){
              if(res){
              	$("#countrydata").empty();
                  $("#countrydata").append('<h3>'+country+' Cases</h3><h4>Confirmed Cases: '+res.confirmed.value.toLocaleString()+'</h4><h4>Recovered Cases: '+res.recovered.value.toLocaleString()+'</h4><h4>Deaths: '+res.deaths.value.toLocaleString()+'</h4>');
              }
            }
          });

		});
	});
</script>
@endsection