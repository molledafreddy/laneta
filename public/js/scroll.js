/*
$("#like").click(function(){
	var data = $("#stage").val();
	var route = "http://laneta2.0.test/comment/like";
	var token = $("#token").val();
	alet(data);
	$.ajax({
		url:route,
		headers: {'X-CSRF-TOKEN':token},
		type: 'POST',
		dataType: 'json',
		//data:{stage: dato}
		data: $("#formulario").serialize(),
		success:function(data)
		{
			$("#valor_like")
		}
	});
});

*/

var morePosts, //controlamos si hay posts
scroll = null;//evitamos que el evento scroll se disparé múltiples veces
 
//creamos una función para llamarla en el evento del scroll
function loadMore()
{
    var id = $(".lastId").attr("id"),
        getLastId, 
        html = "";
        var routePath = $(".routePath").attr("id");
        var urlLike = routePath+"/comment/like";
        var urlEdit = routePath+"/comment/edit";
        var urlDestroy = routePath+"/comment/destroy";
        var urlStore = routePath+"/comment/store";
        var count_likes=0;
		var count_dislikes=0;
        
        var auth = $(".auth").attr("id");
        
    if (id) 
    {
        $.ajax(
        {
            type: "GET",
            url: routePath+"/scroll",
            
           // url: url('/scroll'),
          
            data: `lastId=${id}`,//la última id
           
            success: function(data) 
            {
                $(".before").html("");
                if(data.response == true)
                {       
                       
	                for(datos in data.posts)
			        {
                		html +='<div class="col-md-12">';
			        	html +=	'<div class="card card-notice mb-4 box-shadow">';
			        				html += `<p>Título: ${data.posts[datos].title}</p>`;
			        	html +=			'<div class="card-header"> ';
			            html +=                '<div class="user-data mb-4">';
			            html +=                    `<img class="user-image" src="${data.posts[datos].user.image}" alt="${data.posts[datos].user.username}">`;
			            html +=                   ` <span>${data.posts[datos].user.first_name} ${data.posts[datos].user.last_name} </span>` ;
			            html +=                    `<small class="text-muted">${data.posts[datos].user.created_at}`;
			            html +=                '</div>';
			        	html +=				`<p class="card-title">${data.posts[datos].user.title}</p>`;
			            html +=                `<span class="data text-muted">${data.posts[datos].user.location}</span>`;
			        	html +=			'</div>';
			        	html +=			'<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 500px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1614d710961%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1614d710961%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.234375%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">';
			        	html +=			'<div class="card-body">';
			        	html +=				`<p class="card-text">${data.posts[datos].description}</p>`;

			            html +=                '<div class="comments">';
			            html +=                    '<p class="text-muted">';			            							
			            html +=                        `Comentarios <b>${data.posts[datos].comments.length}</b>`;
			            html +=                    '</p>';
			            html +=                    '<ul class="list-unstyled">';
			            	if (data.posts[datos].comments.length > 3)
			            	{
			            		html += '<li><a href="#" class="text-muted">Ver mas comentarios</a></li>';
        	
        					}
        					
        					for (valor in data.posts[datos].comments) 
        					{
        						
        						for (v in data.posts[datos].comments[valor].likes) {
        							if (data.posts[datos].comments[valor].likes[v].stage=='L') {
        								count_likes++;
        							}else{
        								count_dislikes++;
        							}
        						}
        						
        					
		        				html +=            '<li>';
		                        html +=                 '<div class="text-sm">';
		                        html +=                     '<small>';
		                        html +=                         `<b>${ data.posts[datos].comments[valor].user.username }</b> `;
		                        html +=                         ` ${data.posts[datos].comments[valor].created_at}, `; 
		                        html +=                    ' </small> <br>';
		                        html +=                     `<small>${data.posts[datos].comments[valor].comment}</small>`;
		                        html +=                ' </div>';
		                        html +=                 '<div class="btn-group"> ';
		                        html +=                     `<form action="${ urlLike}" method="post">`;
		                        html +=                         `<input type="hidden" name="_token" value="${data.token}" id="token">`;
		                        html +=							`<input id="post_id" type="hidden" name="post_id" value="${data.posts[datos].id}">`;
		                        html +=                         `<input type="hidden" name="comment_id" value="${data.posts[datos].comments[valor].id }">`;                                
		                        html +=                         '<input type="hidden" name="stage" value="L">';
		                        html +=                        ' <button type="submit" class="btn btn-link text-muted" title="Me gusta">';
		                        html +=                             '<i class="far fa-thumbs-up"></i>'; 

		                        html +=                             `${count_likes}`;
		                        									count_likes=0;	
		                        html +=                         '</button>';
		                        html +=                     '</form>';
		                        html +=                     `<form action="${ urlLike}" method="post">`;
		                        html +=                         `<input type="hidden" name="_token" value="${data.token}" id="token">`;
		                        html +=							`<input id="post_id" type="hidden" name="post_id" value="${data.posts[datos].id}">`;
		                        html +=                         `<input type="hidden" name="comment_id" value="${data.posts[datos].comments[valor].id }">`;
		                        html +=                         '<input type="hidden" name="stage" value="D">';
		                        html +=                         '<button type="submit" class="btn btn-link text-muted" title="No me gusta">';
		                        html +=                             '<i class="far fa-thumbs-down"></i>'; 
		                        html +=                             `${count_dislikes}`;
		                        										count_dislikes=0;	
		                        html +=                         '</button>';  
		                        html +=                     '</form>';    
		                                            if (data.posts[datos].comments[valor].user_id == auth){
		                        html +=                        ` <a class="btn btn-link text-muted" href=" ${urlEdit}">`;
		                        html +=                             '<i class="fas fa-pencil-alt"></i>';
		                        html +=                         '</a>';  
		                        html +=                         `<form action="${ urlDestroy }" method="post">`;
		                        html +=                         `<input type="hidden" name="_token" value="${data.token}" id="token">`;
		                        html +=                             `<input type="hidden" name="_method" value="${data.posts[datos].comments[valor].id}"> `;
		                        html +=                             '<button type="submit" class="btn btn-link text-muted" title="Eliminar">';
		                        html +=                                 '<i class="fa fa-trash-alt"></i> ';
		                        html +=                             '</button>';  
		                        html +=                         '</form>';   
		                        					}
		                        html +=                 '</div>';
		                        html +=                 '<hr>';
		                        html +=             '</li>';
		                    }
		                        html +=				'</ul>';
                               	html +=			'</div>';
                                html +=          `<form  class="form-horizontal" action="${ urlStore}" method="POST">`;
                                html +=                         `<input type="hidden" name="_token" value="${data.token}" id="token">`;
                                html +=    				`<input type="hidden" name="post_id" value="${data.posts[datos].id}"/>`;

                                html +=     			'<div class="input-group">';
                                html +=        			'<input type="text" class="form-control  input-outline-primary" name="comment" placeholder="Escribe un comentario...">';
                                html +=        			'<div class="input-group-append">';
                                html +=            		'<button class="btn btn-outline-primary" type="submit"><i class="fa fa-paper-plane"></i></button>';
                                html +=        		'</div>';
            				    html +=    		'</div>';
                                    
		                        html += 	'</form>';
		    					html += '</div>';
		    					html +=		'</div>';
		        				html +=	'</div>';
                                    
                       		        					
                            	                  
			                 getLastId = data.posts[datos].id;
			        }

	                   $("#scroll").append(html);
	                   morePosts = true;
	                
           		}else{
                    //ya no hay más posts que mostrar
                    morePosts = false;
                 	$("#scroll").append("<div data-alert class='alert alert-info center'>Ya no hay más posts</div>");  
           		}
                $(".lastId").attr("id",getLastId);
 
            },
            error: function()
            {
                //TODO controlar los errores
            }
        });
    }
}
 
//actuamos en en evento del scroll
$(window).on('scroll',function() 
{
    //si hay más posts
    if(morePosts !== false)
    {
        $(".before").html("<img src='/img/loading-circle.gif' />");
        //si scroll es distinto de null
        if (scroll) 
        {
            clearTimeout(scroll); //limpiamos la petición anterior de scroll
        }
        
        //si el scroll ha llegado al final lanzamos la función loadMore()
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10)
        {
            scroll = setTimeout(function() 
            {
                scroll = null;  //lanzamos de nuevo el scroll
                loadMore();
            }, 1000);
        }
    }
})