<script type="text/javascript" src="<?php echo site_url('assets/jquery/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>


<?php if(isset($sortable) && $sortable === TRUE): ?>
<script type="text/javascript" src="<?php echo site_url('assets/custom/js/jquery-ui-1.9.1.custom.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/custom/js/jquery.mjs.nestedSortable.js'); ?>"></script>
<?php endif; ?>

    

<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo site_url('assets/custom/js/tiny_mce/tiny_mce.js'); ?>"></script>
<script type="text/javascript">
        tinyMCE.init({
                // General options
                mode : "textareas",
                theme : "advanced",
                plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

                // Theme options
                theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,
        });
        
</script>
<!-- /TinyMCE -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?php echo site_url('assets/custom/js/bootstrap-select.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/custom/js/jquery.datetimepicker.min.js');?>"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmfZ8LXdHc-voorsUwItQw7ZL2xMeLkkc&sensor=false&libraries=places" ></script>
<script type="text/javascript" src="<?php echo site_url("assets/custom/js/map_point.js");?>"></script>
<script>
    var base_url = '<?php echo site_url(); ?>' ;
</script>
<script type="text/javascript" src="<?php echo site_url('assets/custom/js/adminFunctions.js');?>"></script>
<script>
    $(document).ready(function(){

            //datepicker
            $('.datepicker').datetimepicker({ 
                format : 'Y-m-d',
                maxDate: 0,
                timepicker : false,
                closeOnDateSelect : true,
                validateOnBlur : false,
                yearStart : 1997,
                scrollInput : false,

            });

            //Time Picker
            $('.timepicker').datetimepicker({
            datepicker:false,
            format:'H:i',       
            });
            
          var currentPath = window.location.pathname;
          if(currentPath.search('admin/member')!== -1){
              unitSelection();
          } 
          if(currentPath.search('admin/member/add')!== -1){             
              telephoneCheck();
          }
            
//       function pull_checked_item_top(){
//        //select the checked elements
//        //store them in a variable
//        var checked_departments = $('#department_list .department').has('input:checked');
//      
//        //remove them from DOM
//        checked_departments.remove();
//        //append the variable data inside the particular DOM      
//        $('#department_list').prepend(checked_departments);
//        }
//        $(function(){
//            $('#toggle_departments').click(function(){
//                $('#department_list').toggle(500);
//            });
//
//            pull_checked_item_top();
//
//
//            }
//       );
    });
         
</script>
</body>
</html>