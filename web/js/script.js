$(function(){
	$(document).on('click', '.example', function(event){
		if (!event) {event = window.event}
		event.preventDefault();
		var msgdata = $("#update" + formid).serialize();
        $.ajax({
			async: true,
			type: "POST",
			url: "/index.php/example/exampleaction",
			data: msgdata,
			success: function(data) {
                alert(1);
            },
            error:  function(xhr, str){
                alert("Возникла ошибка6: " + xhr.responseText);
            }
        });
	});
});
