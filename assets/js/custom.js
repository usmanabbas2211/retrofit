$(document).ready(function(){
    $('.fa-bars').on('click',function(){
        $('.card-img-top').addClass('img-res').addClass('float-left')    
        $('.card-body').addClass('card-body-list')    
        $('.fa-bars').addClass('text-danger')
        $('.fa-th').removeClass('text-danger')
        $('.products>.item').removeClass('col-md-3').addClass('list')
        $('.item').addClass('mt-2')
    })
    $('.fa-th').on('click',function(){
        $('.card-img-top').removeClass('img-res')    
        $('.fa-bars').removeClass('text-danger')
        $('.fa-th').addClass('text-danger')
        $('.card-body').removeClass('card-body-list')
        $('.products>.item').addClass('col-md-3').removeClass('list')
    })

    // // filter functionality

    // $('#car').on('click',function(){ 
    //         $('.car').show('fast');
    //         $('.bike').hide('fast');
    //         $('.truck').hide('fast');
    // })
    // $('#bike').on('click',function(){
    //     $('.bike').show('fast')  
    //     $('.car').hide('fast');
    //     $('.truck').hide('fast');
    // })
    // $('#truck').on('click',function(){ 
    //     $('.truck').show('fast'); 
    //     $('.car').hide('fast');
    //     $('.bike').hide('fast');
    // })
    // $('#all').on('click',function(){
    //     $('.products>.item').show('fast')
    // })


    

    $('#search').on('blur',function(){
        $('.item').show()
    })
   
    
})
