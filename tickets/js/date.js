var init = function(){
	date = new Date();
	var dia =  (date.getDate()<10) ? '0' + date.getDate() : date.getDate();
	var mes = date.getMonth()+1; var mes = (mes < 10) ? '0' + mes : mes;
	var fecha = date.getFullYear() + '-' + mes + '-' + dia;

	var hora 
}