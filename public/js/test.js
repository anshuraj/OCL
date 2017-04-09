$(function() {
    $('#form-test').submit(function (e) {
        e.preventDefault();
        var postData = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
				var response = JSON.parse(response);
                console.log(response);
        		if(response.status == 1){
        			$("#data").html('<div class="panel panel-default">  <div class="panel-body">Test: '+response.data[0]['title']+'<button class="btn btn-default">Add questions</button></div></div>');
        		}
                
            } 
        }); 
    });
}); 