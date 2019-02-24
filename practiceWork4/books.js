function loadData() {

	$.ajax({

		 url: "books.xml",
		 dataType: "xml",
		 success: function(data) {
		        alert("file is loaded");
		        $(data).find('book').each(function(){
			      var Title = $(this).find('title').text();
            var Author = $(this).find('author');
            var Price = $(this).find('price').text();
            var Price = $(this).find('price').text();
			      var Year = $(this).find('year').text();
            var Category =$(this).attr('category');
            var authors = ' '
            $(Author).each(function(){
                authors+=' '+$(this).text()+','
            })
			      var info = '<tr><td>'+ Title+'</td>'+'<td>'+authors+'</td>'+'<td>'+Price+'</td>'+'<td>'+Year+'</td>'+'<td>'+Category+'</td></tr>';
			      $("table").append(info);
		        });

		 },
		 error: function() { alert("error loading file");  }
     });
}
