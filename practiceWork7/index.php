
<?php

	header('Content-type:application/json');
	$con=mysqli_connect("localhost:8889","root","root","PW7");
	if (mysqli_connect_errno())
	{
		response("DB Connection Failed","failed");
	}
	else
	{
		$result = mysqli_query($con,"SELECT `Book_id`, `title`, `year`, `price`, `category` from Book");
		$data=array();
		while($row=mysqli_fetch_array($result))
		{
			extract($row);
			$data[]=array("Book_id"=>$row['Book_id'],"title"=>$row['title'],"year"=>$row['year'],"price"=>$row['price'],"category"=>$row['category']);
		}
		response("Bookstore",$data);
	}
	mysqli_close();

	function response($status_message,$data)
	{
		$response['status_message']=$status_message;
		$response['data']=$data;
		$json_response = json_encode($response);
		echo $json_response;
	}

?>
