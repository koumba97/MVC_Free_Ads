$(document).ready(function(){

    $('#profil_file_input').on('change', function() {
                
        var file = this.files[0];
        var reader = new FileReader();
      
        reader.onloadend = function() {
            $('.profil_picture_edit').css('background-image', 'url("' + reader.result + '")');
            $('.profil_picture_edit').css('background-size', 'cover');

            var fakePath = $('#profil_file_input').val();
            var fileName = fakePath.substr(12);
            $('#picture_name').val(fileName);

        }
        reader.readAsDataURL(file);
    });

    $('#file1').on('change', function() {
                
        var file = this.files[0];
        var reader = new FileReader();
      
        reader.onloadend = function() {
            $('.file1').css('background-image', 'url("' + reader.result + '")');
            $('.file1').css('background-size', 'cover');

            var fakePath = $('#file1').val();
            var fileName = fakePath.substr(12);
            //$('#picture_name').val(fileName);

        }
        reader.readAsDataURL(file);
    });

    $('#file2').on('change', function() {
                
        var file = this.files[0];
        var reader = new FileReader();
      
        reader.onloadend = function() {
            $('.file2').css('background-image', 'url("' + reader.result + '")');
            $('.file2').css('background-size', 'cover');

            var fakePath = $('#file2').val();
            var fileName = fakePath.substr(12);
            //$('#picture_name').val(fileName);

        }
        reader.readAsDataURL(file);
    });

    $('#file3').on('change', function() {
                
        var file = this.files[0];
        var reader = new FileReader();
      
        reader.onloadend = function() {
            $('.file3').css('background-image', 'url("' + reader.result + '")');
            $('.file3').css('background-size', 'cover');

            var fakePath = $('#file3').val();
            var fileName = fakePath.substr(12);
            //$('#picture_name').val(fileName);

        }
        reader.readAsDataURL(file);
    });

    $('#file4').on('change', function() {
                
        var file = this.files[0];
        var reader = new FileReader();
      
        reader.onloadend = function() {
            $('.file4').css('background-image', 'url("' + reader.result + '")');
            $('.file4').css('background-size', 'cover');

            var fakePath = $('#file4').val();
            var fileName = fakePath.substr(12);
            //$('#picture_name').val(fileName);

        }
        reader.readAsDataURL(file);
    });


    // ADD POP-UP
    $('.add_annonce').click(function(e){
        $('.popup_add').fadeIn(500);
        $('.fond_add').fadeIn(500);
        $('.popup_add').css('display', 'flex');
        
    });

    $('.fond_add').click(function(e){
        $('.popup_add').fadeOut(500);
        $('.fond_add').fadeOut(500);
    });
    $('.popin-dismiss').click(function(e){
        $('.popup_add').fadeOut(500);
        $('.fond_add').fadeOut(500);
    });


    count=0
    
    $('.faux_select').click(function(e){
        if(count==0){
            $('.all_options').slideDown();
            count=1;
            return;
        }

        if(count=1){
            $('.all_options').slideUp();
            count=0;
            return;
        }
      
    });

  

});


    // ANNONCE PICTURES
    function changePicture(picture){
        $('.show').css('background-image', 'url("../images/annonce/'+ picture +' ")');
    }

    function changePictureEdit(picture){
        //alert(picture);
        $('.show').css('background-image', 'url("../images/annonce/'+ picture +' ")');
    }