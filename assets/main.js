baseUrl = "execute.php?";

function login(){
	username = $('#username').val();
	password = $('#password').val();

	$.ajax({
		url: baseUrl + 'act=cekLogin&type=process',
		method : 'POST',
		data : {username:username,password:password},
		success:function(response){
			if (response == 1) {
				swal("Berhasil Login", "", "success");
				setTimeout(function(){ window.location.href = 'home.php'; }, 3000);
				//window.location.href = 'home.php';
			}else{
				swal("Login Gagal", "", "error");
				//$('#rslt').html("Login Gagal");	
			}
			
		}
	});
}

function addUsers(){
	nama = $('#addNama').val();
	email = $('#addEmail').val();
	password = $('#addPassword').val();
	//password = $('#password').val();
	//alert("sini");
	$.ajax({
		url : baseUrl + 'act=save&type=addUsers',
		method : 'post',
		data: { nama:nama,email:email,password:password},
		success:function(response){
			if (response == 1) {
				swal("Berhasil Menambahkan Data", "", "success");
				setTimeout(function(){ location.reload(); }, 3000);
			}else{
				swal("Gagal Menambahkan Data", "", "error");
			}
		}
	});
}

function showUsers(id){
	$.ajax({
		url : baseUrl + 'act=getData&type=dataUsers',
		method : 'post',
		data: { id:id},
		success:function(response){
			obj_result = jQuery.parseJSON(response);
			id = obj_result.id;
			nama = obj_result.nama;
			email = obj_result.email;
			password = obj_result.password;

			$('#idUsers').val(id);
			$('#editNama').val(nama);
			$('#editEmail').val(email);
			$('#editPassword').val(password);
		}
	});
}

function editUsers(){
	id = $('#idUsers').val();
	nama = $('#editNama').val();
	email = $('#editEmail').val();
	password = $('#editPassword').val();

	$.ajax({
		url : baseUrl + 'act=edit&type=editUsers',
		method : 'post',
		data: { id:id,nama:nama,email:email,password:password},
		success:function(response){
			if (response == 1) {
				swal("Berhasil Mengubah Data", "", "success");
				setTimeout(function(){ location.reload(); }, 3000);
			}else{
				swal("Gagal Mengubah Data", "", "error");
			}
		}
	});
}

function deleteUsers(id){
	//alert(id);
	swal({
	  title: "Anda yakin ingin menghapus data ini ?",
	  text: "",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes",
	  cancelButtonText: "No",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm) {
	  if (isConfirm) {
	   // swal("Berhasil!", "Your imaginary file has been deleted.", "success");
	    $.ajax({
            url: baseUrl + 'act=delete&type=users',
            type: "POST",
            data: { id:id },
            success: function () {
                swal("Done!", "", "success");
                setTimeout(function(){ location.reload(); }, 3000);
            },
            /*error: function (xhr, ajaxOptions, thrownError) {
                swal("Canceled!", "", "error");
            }*/
        });
	  } else {
	    	swal("Cancelled", "", "error");
	  }
	});
}