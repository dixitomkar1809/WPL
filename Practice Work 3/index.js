$(document).ready(
    function(){
        $.ajax({
            url:'movies.xml',
            dataType: 'xml',
            success: function(xml){
                $(xml).find('movie').each(function(){
                    var title = $(this).find('title').text();
                    var director = $(this).find('director').text();
                    var genre = "";
                    $(this).find('genre').each(function(index, element){
                        if(index == 0){
                            genre +=$(this).text();
                        }
                        else{
                            genre += ", " + $(this).text();
                        }
                    });
                    var rating = $(this).find('mpaa-rating').text();
                    var cast = "";
                    $(this).find('person').each(function(index,element){
						if(index == 0 )	{
							cast += $(this).attr('name');							
						}
						else {
							cast +=  ", " + $(this).attr('name');
						}
                    });
                    var desc = $(this).find('imdb-info').children('synopsis').text();
                    var imbdrating = $(this).find('imdb-info').children('score').text();
                    
                    $('#table').append('<tr><td>' + title + '</td><td>' + genre + '</td><td>' + rating + '</td><td>' + director + '</td><td>' + cast + '</td><td>' + desc + '</td><td>' + imbdrating + '</td></tr>');
                });
            }
        })
    }
)