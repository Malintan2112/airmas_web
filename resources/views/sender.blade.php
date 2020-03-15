<form action="{{URL::to('/sender')}}" method="post">
	{{csrf_field()}}
		<input type="text" name="contect">
		<input type="submit" >
</form>