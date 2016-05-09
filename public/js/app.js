$(document).ready(function(){
    /*$('#search_box').on('keyup',function(){
        $('#search_button').attr('href',serverHost+'/search/'+$(this).val());
    }).on('keypress',function(event){
        if (event.keyCode==13 &&  $('#search_button').attr('href')!=''){
            location.href =  $('#search_button').attr('href');
        }
    });*/
    $('.table_statistics').tablesorter({
        sortList : [[0,0]]
    });

    $('table').tablesorter();

    $('.tab-summoners').on('click',function(){
        if (!$(this).hasClass("tab-active")){
        var data = $(this).data('show');
        $('.summoner_stats').each(function(){
            $(this).hide();
        });
        $('.tab-summoners').each(function(){
            $(this).removeClass("tab-active");
        });
        $('#'+data).show();
        $(this).addClass('tab-active');
        }
        drawGraphics(winratio,'winratio');
        drawGraphics(gold,'gold');
        drawGraphics(kda,'kda');
        drawGraphics(matches,'played');
    })
});