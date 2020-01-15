$(function(){
	function tampil_form(selektor){
		if($(selektor).val()=='modul'){
			$('#modul').show();
			$('#skrip').hide();
		}else if($(selektor).val()=="skrip"){
			$('#skrip').show();
			$('#modul').hide()
		}else{
			$('#modul, #skrip').hide();
		}
	}
	tampil_form('#tipe select');
	$('#tipe select').change(function(){
		tampil_form(this);
	});
});