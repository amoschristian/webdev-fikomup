$('document').ready(function(){
	//Membuat skrip dropdown
	$('.sidebar .dropdown-menu').hide();
	$('.sidebar .dropdown').click(function(){
		if($(this).find('.dropdown-menu').is(':hidden')){
			$('.sidebar .dropdown').removeClass('active').find('.dropdown-menu').slideUp(300);
			$(this).addClass('active').find('.dropdown-menu').slideDown (300);
		}
	});	
	
	//Menerapkan plugin dataTable
	$(".table-data").dataTable({
		"iDisplayLength": 20, 
		"aLengthMenu": [5,10,20,50,100], 
		"sPaginationType": "full_numbers"
	});
	
	
	//Memberi pesan pada tombol hapus
	$('.btn-danger').click(function(){
		if(confirm("Apakah Anda yakin?")){
			return true;
		}else{
			return false;
		}
	});
});