$(function(){
	function tampil_form(selektor){
		if($(selektor).val()=='halaman'){
			$('#link_halaman').show();
			$('#link_kategori, #link_url').hide();
		}else if($(selektor).val()=="kategori"){
			$('#link_kategori').show();
			$('#link_halaman, #link_url').hide()
		}else if($(selektor).val()=="url"){
			$('#link_url').show();
			$('#link_halaman, #link_kategori').hide();
		}
	}
	
	tampil_form('#jenis_link select');
	
	$('#jenis_link select').change(function(){
		tampil_form(this);
	});
});