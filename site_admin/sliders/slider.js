
	// ADD SCRIPTS
 	$(document).on('click','#addSliderBtn',function(e){

		var data = new FormData( document.getElementById('addform'));

		$.ajax({
			url:"sliders/add.php",
			type: "POST",
			data:data,
			async: false,
	    processData: false,
	    contentType: false,
		})
		.done(
			function(data){
				console.log(data);
				if(data==="Success"){
					window.location.reload();
				}else{
					alert("Error has happened");
				}
			}
		)


		e.preventDefault();
	});


	// DELETE SCRIPTS

	$(document).on('click','#delete-btn',function(e){

		var id = $(this).data('id');

		$('#delete_id').val(id);
	});

	$(document).on('click','#deleteSlider',function(e){
		var data = new FormData(document.getElementById('deleteform'));
		$.ajax({
			url:"sliders/delete.php",
			type:"POST",
			data:data,
			async: false,
			processData: false,
			contentType: false,
		}).done(
			function(data){
				console.log(data);
				if(data==="success"){

					window.location.reload();

				}else{
					alert("Error has happened");
				}
			}
		)

		e.preventDefault();

	});

	//EDIT SCRIPTS

	$(document).on('click','#edit-btn',function(e){
		var id = $(this).data('id');
		var text = $(this).data('desc');
		var img = $(this).data('img');
		var title = $(this).data('title');
		$('#edit_id').val(id);
		$('#edit_header').val(title);
		$('#edit_text').val(text);
		$('#old_img_name').val(img);



		url="../course_site/images/slider/";
		url+=img;



		$('#edit_image').attr('src',url);


	});

	$(document).on('click','#editSlider',function(e){

		var data = new FormData(document.getElementById('editform'));

		$.ajax({
			url:"sliders/edit.php",
			type:"POST",
			data: data,
			async: false,
			processData: false,
			contentType: false,
		})
		.done(function(data){
			 console.log(data);
			 if (data=="success") {
				 window.location.reload();
			 }
			 else{
				 alert("LOL");

				}
		})
	})
