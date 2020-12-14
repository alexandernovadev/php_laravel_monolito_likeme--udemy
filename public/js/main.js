var url = 'http://localhost/course/IntragramLaravel/public/'

window.addEventListener("load", function()
{
    console.log("Evento Escuchado");

    function like ()
    {
        
        $('.btn-like').unbind('click').click(function(){
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'img/heart-red.png')
            console.log("Like");

            var id = $(this).data('id'); 
            $.ajax({
                url: url+'like/'+id,
                type: 'GET',
                success: function (res) 
                {
                    if(res.like)
                    {
                        console.log("LIKE A POST");
                        console.log(res.contador);
                        $('.con_likes'+id).html(res.contador);
                        
                    }
                    else
                    {
                        console.log("LIKE A POST");
                    } 
                }
            });

            dislike();
        });
    }
    like();

    function dislike ()
    {
        // No repite ni encadena clicks PROBLEMA QUE TUVE CUANDO COMENZE
        $('.btn-dislike').unbind('click').click(function(){
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'img/heart-black.png')
            console.log("Dislike");

            var id = $(this).data('id'); 
            $.ajax({
                url: url+'dislike/'+id,
                type: 'GET',
                success: function (res) 
                {
                    if(res.like)
                    {
                        console.log("DSILIKE A POST");
                        console.log(res);
                        $('.con_likes'+id).html(res.contador);
                        
                    }
                    else
                    {
                        console.log("DISLIKE A POST");
                    } 
                }
            });

            like();
        });
    }
    dislike();

    // Buscador

    $('#buscador').submit(function(e){
        // e.preventDefault();
        
        $(this).attr('action',url+'gente/'+$('#search').val());
        $(this).submit();
    });
});