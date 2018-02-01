 $(function(){
    $("#submit").on("click", function(e) {
        e.preventDefault();
      getInfo();
    });

    $('#form').on('submit', function(e){
      e.preventDefault();
      getInfo();
    });
});


function getInfo() {

var formData = $('#form').serialize();

$.ajax({
    type: 'POST',
    url: 'veiksmas.php',
    data: formData,
    success: function(data) {
    	
    	$(".resultatas").html(
    		data
    	);
    }
});

};