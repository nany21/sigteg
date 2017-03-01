$(document).ready(function(){
	var cantidad = 3;
	$("#remove-input").click(function(){
		if(cantidad > 0){
			$('.parti'+cantidad).remove();
			cantidad--;
			$('#total').val(cantidad);
		}

		if(cantidad == 1){
			$("#remove-input").css({"display": "none"});
		}
	});

	$("#input-plus").click(function(){
		if(cantidad < 12){
			cantidad++;
			$("#remove-input").css({'display':'block'});
			var np_c = document.createElement('input');
			np_c.id='participante'+cantidad;
			np_c.name='cedula'+cantidad;
			var np_n = document.createElement('input');
			np_n.id='participante'+cantidad;
			np_n.name='nombre'+cantidad;
			var np_a = document.createElement('input');
			np_a.id='participante'+cantidad;
			np_a.name='apellido'+cantidad;

			$('#mas').append('<div class="tr parti'+cantidad+'"><p class="p_center">Participante '+(cantidad-2)+'</p></div><div class="tr parti'+cantidad+'"><label for="cedula'+cantidad+'"><p class="p_left"><span class="icon-sort-numerically-outline"></span> Cédula de Participante:</p></label><div class="td" id="cedula'+cantidad+'" onKeyPress="return SoloNumeros(event);">');
			$('#cedula'+cantidad).append(np_c);	
			$('#mas').append('</div><div class="td_2 parti'+cantidad+'"><label><p style="color:red; margin-top:px;">(*)</p></label></div></div>');	
			$('#mas').append('<div class="tr parti'+cantidad+'"><label for="nombre'+cantidad+'"><p class="p_left"><span class="icon-spell-check"></span> Nombre de Participante:</p></label><div class="td" id="nombre'+cantidad+'" onkeypress="return soloLetras(event);">');		
			$('#nombre'+cantidad).append(np_n);	
			$('#mas').append('</div><div class="td_2 parti'+cantidad+'"><label><p style="color:red;">(*)</p></label></div></div>');			
			$('#mas').append('<div class="tr parti'+cantidad+'"><label for="apellido'+cantidad+'"><p class="p_left"><span class="icon-spell-check"></span> Apellido de Participante:</p></label><div class="td" id="apellido'+cantidad+'" onkeypress="return soloLetras(event);">');		
			$('#apellido'+cantidad).append(np_a);	
			$('#mas').append('</div><div class="td_2 parti'+cantidad+'"><label><p style="color:red;">(*)</p></label></div></div>');
			$('#total').val(cantidad);
		}

	});
});

function SoloNumeros(evt){
	 if(window.event){
	  keynum = evt.keyCode;
	 }
	 else{
	  keynum = evt.which;
	 }
	 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
	  return true;
	 }
	 else{
	 	//alert("Solo Debe Ingresar Numeros");
	  return false;
	 }
	}		 

	function soloLetras(e) 
	{
	    key = e.keyCode || e.which;
	    tecla = String.fromCharCode(key).toString();
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ,-.";
	    especiales = [8, 37, 39, 46, 6];
	    tecla_especial = false
	    for(var i in especiales) 
	    {
	        if(key == especiales[i]) 
		        {
		           tecla_especial = true;
		           break;
		        }
	    }
	    if(letras.indexOf(tecla) == -1 && !tecla_especial){
	    	//alert('Sólo debe Ingresar Letras');
	        return false;
	    }
	}