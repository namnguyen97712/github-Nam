@extends('welcome')
@section('content')
<style>
	*{
		font-family: Arial;
	}
	.duongke{
		border: 2px solid burlywood;
		width: 10%;
	
	}
	.chon_mon{
		position:absolute;
		top:5px;
		right: 5px;	
		
	}
	.tab-mua{
		position: fixed;
		bottom: 0px;
		height: 50px;
		z-index: 1000;
		width: 100%;
		left: 0px;
		background-color: wheat;
	}
</style>
<form action="{{URL::to('/gio-hang')}}" method="POST">
{{ csrf_field() }}
	<div class="w-100"> 
	<div class="container">	
	<div class="tab-mua fixed">
	<div class="float-left w-75 h-100 p-2 pl-5">
	<h3><b>Chọn món</b></h3>
	</div>
	<div class="float-left w-25 pt-2 d-flex pr-0 pl-5">
	<div class="soluongmon pr-4 pt-2 h5"></div>

	<input type="hidden" class="tongtienbian" value="0">
		<button class="btn btn-success ml-4" type="submit">Mua ngay</button>
	</div>
	</div>
	
	</div>
	</div>
	
	@foreach($category as $key=>$value)
	<div id="{{$value->id_danh_muc}}" class="w3-main w3-content w3-padding"
		style="max-width: 1200px;  text-align: center;">
		<div class="w3-row-padding w3-padding-16 w3-center" id="food">
		<h2>{{$value->ten_danh_muc}}</h2>
		<div class="mb-5"><center><hr class="duongke"></center></div>
			@foreach($foods as $key => $food)
				@if($food->id_danh_muc == $value->id_danh_muc)
					
						<div  for="{{$food->id_mon_an}}" class="w3-quarter" style="position: relative;">
							<label for="{{$food->id_mon_an}}"><img src="{{asset('public/upload/food/'.$food->file_anh)}}" style="border-radius: 10px;" alt="Steak" height="200px"
								width="280px"></label>
							<input class="chon_mon " id="{{$food->id_mon_an}}"  data-giafood="{{$food->gia_tien}}" type="checkbox" name="id_mon_an[]" value="{{$food->id_mon_an}}" >	
							<label for="{{$food->id_mon_an}}"><h3 class="mt-2"><b>{{$food->ten_mon_an}}</b></h3></label>
							<p><span class="h5 text-secondary">{{$food->gia_tien}} VND</span></p>
						</div>
				
				@endif	
			@endforeach
			</div>	
		</div>	
		<div class="container"><hr></div>
			@endforeach	
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
			
			var countChecked = function() {
				
			var n = $( ".w3-quarter input:checked" ).length;
	
		
			$( ".soluongmon" ).text( n +" món được chọn" );
		
			
			};
			countChecked();
			
			$( ".chon_mon" ).on( "click", countChecked );
			</script>	

@endsection
