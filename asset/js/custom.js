var runMoveApps = 'stop';
var roundApps = 1;

$(function(){

	AppsSetting();

    $(document).delegate(".AppsSetting", "click", function() {
    	if($(this).hasClass('open')) {

    		runMoveApps = "start";
    		roundApps = 1;

		    $(".sortable").sortable({
		    	items: ".ui-state-default",
		    	cancel: ".ui-state-disabled",
		        tolerance: 'pointer',
		        cursor: "move",
		        revert: 'invalid',
		        placeholder: 'sortable-placeholder',
		        forceHelperSize: true
		    });

			$('.ui-state-default a').each(function (index,item) {
			    var href = $(this).attr("href");
			    $(this).attr("ref",href);
			    $(this).attr("href","javascript:;");
			});

		    $(".ui-state-default i").removeAttr('class');

		   	$(".ui-state-default i").addClass("btn-hidden-apps");
		    $(".ui-state-default i").addClass("fa fa-times-circle");

		    $(".ui-state-hidden i").removeClass("btn-hidden-apps");
		    $(".ui-state-hidden i").removeClass("fa fa-times-circle");
		    $(".ui-state-default a").removeClass("hidden-apps");

		    $(".ui-state-hidden i").addClass("btn-display-apps");
		    $(".ui-state-hidden i").addClass("fa fa-check-circle");
		    $(".ui-state-hidden a").addClass("hidden-apps");


    	} else {

    		$(".ui-state-default .icon").stop( false, true );
    		runMoveApps = "stop";
    		$(".sortable").sortable("cancel");
    		$(".sortable").sortable("destroy");
    		$(".ui-state-default a").removeClass("hidden-apps"); 
    		$(".ui-state-hidden a").addClass("hidden-apps");

    		$('.ui-state-default a').each(function (index,item) {
			    var ref = $(this).attr("ref");
			    $(this).attr("href",ref);
			    $(this).attr("ref","javascript:;");
			});

    	}
	});

	$(document).delegate(".btn-cancel-apps", "click", function() {
		$(".AppsSetting")[0].click();
	});

	$(document).delegate(".btn-hidden-apps", "click", function() {
		$(this).removeClass("btn-hidden-apps");
		$(this).removeClass("fa-times-circle");
		$(this).addClass("btn-display-apps");
		$(this).addClass("fa-check-circle");
		$(this).parent().find('a').addClass("hidden-apps");
		$(this).parent().find('input[name^=app_status]').val(0);
	});

	$(document).delegate(".btn-display-apps", "click", function() {
		$(this).removeClass("btn-display-apps");
		$(this).removeClass("fa-check-circle");
		$(this).addClass("btn-hidden-apps");
		$(this).addClass("fa-times-circle");
		$(this).parent().find('a').removeClass("hidden-apps");
		$(this).parent().find('input[name^=app_status]').val(1);
	});

	$('body').on('keyup',function(e){
      if(e.which==104 || e.which==72){
       	if($('.apps-description').hasClass('block')) {
	 		$('.apps-description').removeClass("block");
	 	} else {
	 		$('.apps-description').addClass("block");
	 	}
      }
    });

});

function AppsSetting()
{
	if(runMoveApps == 'start' && roundApps < 100) {
		$(".ui-state-default .icon").stop( false, true ).effect( "bounce", { direction: "up", times: 1, distance: 5 }, 0 );
		roundApps++;
	}

	setTimeout(function(){
		AppsSetting();
	},500);
}

function sweet_dialog(title,message,type,func){
    var title   = title;
    var message = message;
    var type    = type;
    var func    = func;
    
    if(type == "warning"){
        Swal.fire({
            title              : title,
            html               : '<b>'+message+'</b>',
            type               : type,
            showCancelButton   : true,
            confirmButtonColor : '#f0ad4e',
            cancelButtonColor  : '#aaa',
            confirmButtonText  : '<i class="fa fa-check"></i> ยืนยัน',
            cancelButtonText   : '<i class="fa fa-times"></i> ยกเลิก',
            buttonsStyling     : true
        }).then((result) => {
            if(result.value) {
                if(func!=""){
                    var button = '<a href="javascript:void(0);" id="dialog" onclick="'+func+'"></a>';
                    $("#dialog_btn").html(button);

                    $("#dialog").trigger('click');
                }
            }
        });
    }else if(type == "load"){        
        Swal.fire({
            title   : title,
            html    : '<b>'+message+'</b>',
            allowOutsideClick : false,
            onOpen  : () => {
                Swal.showLoading();
            },
            onClose : () => {
            }
        });
    }else if(type == "photo"){
        Swal.fire({
            title : '',
            type  : '',
            html  : '<img src="'+message+'" width="250">',
            showConfirmButton : false,
            showCloseButton   : true,
            showCancelButton  : true,
            cancelButtonColor : '#aaa',
            cancelButtonText  : '<i class="fa fa-times"></i> ปิด',
        });
    }else if(type == "form"){
        Swal.fire({
            title : '',
            type  : '',
            html  : message,
            allowOutsideClick : false,
            showConfirmButton : false,
            showCloseButton   : true,
            showCancelButton  : false,
            cancelButtonColor : '#aaa',
        });  
    }else if(type=='success' && func != '' || func != undefined){
        Swal.fire({
            title              : title,
            html               : '<b>'+message+'</b>',
            type               : type,
            allowOutsideClick  : false,
            showCancelButton   : false,
            confirmButtonText  : '<i class="fa fa-check"></i> ตกลง',
            buttonsStyling     : true
        }).then((result) => {
            if(result.value) {
                if(func!=""){
                    var button = '<a href="javascript:void(0);" id="dialog" onclick="'+func+'"></a>';
                    $("#dialog_btn").html(button);

                    $("#dialog").trigger('click');
                }
            }
        });        
    }else{
        Swal.fire({
            title : title,
            html  : '<b>'+message+'</b>',
            type  : type
        });    
    }
}

function show_alert(message){
    sweet_dialog('',message,'error');
}

function show_success(message,func){
    sweet_dialog('',message,'success',func);
}

function show_confirm(message,func){
    sweet_dialog('',message,'warning',func);
}

function show_form(message){
    sweet_dialog('',message,'form');
}

function show_load(message){
    sweet_dialog('',message,'load');
}

function show_photo(url){
    sweet_dialog('',url,'photo');
}