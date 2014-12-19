function unitSelection(){
   
    var zoneField = $('#zone_id');
    var unitBlock = $('#unit');
    var unitField = $('#unit_id');
    zoneField.change(function(){
        var zone_id = zoneField.val();
        
        var request = $.ajax({
                            url: base_url + 'admin/unit/get_specific_units',
                            type: "GET",
                            data: { zone_id : zone_id },
                            dataType: "json"
                            });
 
        request.done(function( response ) {
           var str = '<option disabled selected >Select a unit</option> '; 
          if(response.length > 0){                                                  
              $.each(response, function(key, unit){
                   str += '<option value="' + unit.unit_id + '">' + unit.name + '</option>' 
              });


              $('#unit_id').html(str);
              unitBlock.show();
          }
        });
    });
    
    unitField.change(function(){
        var unit_id = unitField.val();
        $('#add').attr('href', base_url + 'admin/member/add/' + unit_id);
        $('#view').attr('href', base_url + 'admin/member/unit/' + unit_id);
        $('#anchorBlock').show();
    });


}


function telephoneCheck(){
    $('#telephone_check').click(function(){
        var telephone = $('#telephone').val();
        console.log(telephone);
        
        var request = $.get(
            base_url + 'admin/member/get_member_json/'+ telephone,
            function( member ) { 
                if(member!='') member = $.parseJSON(member);
                if(member.member_id != undefined){
                    str = 'Member alredy exist : ';
                    str += '<a href = "'+ base_url + 'admin/member/edit/' + member.member_id + '">' +member.name + '</a>' ;

                     $('#existing_member').html(str).removeClass('hide'); 
                     $('#member_form').addClass('hide');
                }
                else{
                    $('#member_form').removeClass('hide');
                    $('#existing_member').addClass('hide');
                }
        });
        
    });
}