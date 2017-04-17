$(function() {
    $('#form-assign').submit(function (e) {
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
        			$("#data").append('<div class="panel panel-default">  <div class="panel-body">Assignment: '+response.data[0]['name']+'<button class="btn btn-default" style="float: right;">Add questions</button></div></div>');
                    $("#assign").hide();

        		}
                else if(response.status == 0){
                    alert(response.message);
                }
                
            } 
        }); 
    });
}); 