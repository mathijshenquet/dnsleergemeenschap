jQuery.event.special.tripleclick = {
    setup: function(data, namespaces) {
        var elem = this, $elem = jQuery(elem);
        $elem.bind('click', jQuery.event.special.tripleclick.handler);
    },
    teardown: function(namespaces) {
        var elem = this, $elem = jQuery(elem);
        $elem.unbind('click', jQuery.event.special.tripleclick.handler);
    },
    handler: function(event) {
        var elem = this,
	$elem = jQuery(elem),
	clicks = $elem.data('clicks') || 0;
	//Averiguamos cuando fue el click anterior
	ClickAnterior = $elem.data('ClickTiempo') || 0;
	//Extraemos el tiempo de este click	
	var d = new Date();
	var ClickTiempo=d.getTime();
	//Comparamos a ver si han pasado 500 milisegundos
	if (ClickTiempo <= (ClickAnterior + 150)) {
		//si no han pasado, sumamos un click
		clicks += 1;
	}else{
		//si han pasado 500 milisegundos
		//reiniciamos el contador a uno
		clicks = 1;
	}
	$('#ejemplo').html('Clicks: '+clicks);
       if ( clicks === 3 ) {
            clicks = 0;
            event.type = "tripleclick";
            jQuery.event.handle.apply(this, arguments)
        }
        $elem.data('clicks', clicks);
        $elem.data('ClickTiempo', ClickTiempo);
    }
};