$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});


$(document).ready(function(){
    $('#select_img').on('click',function(){
        if(this.checked){
            $('.imgbox')function(){
                this.checked = true;
            };
        }else{
             $('.imgbox')function(){
                this.checked = false;
            };
        }
    });
});
