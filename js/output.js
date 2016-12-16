//General
var general_enter=function(themsname,themsvalue,theidname,theidvalue,thetitlename,thetitlevalue,theurl){
    var formdata = {
            msname: themsname,
            msvalue: themsvalue, 
            idname: theidname,
            idvalue: theidvalue, 
            titlename: thetitlename,
            titlevalue: thetitlevalue 
            };
    $.ajax({
        url : $('#opurl').val()+'center/setsession',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            location.assign($('#opurl').val()+theurl);
        }
    }); 
};
//Tool
var tool_enter=function(theidname,theidvalue,thetoolname){
    var formdata = {
            msname: '',
            msvalue: '', 
            idname: theidname,
            idvalue: theidvalue, 
            titlename: '',
            titlevalue: '' 
            };
            
    $.ajax({
        url : $('#opurl').val()+'center/setsession',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            $('#tooldiv').load($('#opurl').val()+thetoolname);
            $('#tooldiv').css('visibility','visible');
        }
    }); 
};
var tool_deal=function(theid, thedealurl,thereturnurl){
    var formdata = { id: theid };
    $.ajax({
        url : $('#opurl').val()+thedealurl,
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#tooldiv').load($('#opurl').val()+thereturnurl);
        },
    }); 
};
var general_add=function(controler,target){
    var formdata = { tname: target, };
    $.ajax({
        url : $('#opurl').val()+controler+'/add_blankrecord',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            location.assign($('#opurl').val()+controler+'/'+target);
        }
    }); 
};
var general_delete=function(i,controler,target){
    $('#footer').html('');
    var formdata = { id: i, tname: target, };
    $.ajax({
        url : $('#opurl').val()+controler+'/delete_record',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            $('#itemdiv_'+i).remove();
            $('#footer').html('删除成功！');
        }
    }); 
};

//Welcome Controller
var stafflogin=function(){
    $('#footer').html('');
    var formdata = {
        accountno: $('#accountno').val(),
        password: $('#password').val() };
    $.ajax({
        url : $('#opurl').val()+'center/stafflogin',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            if(data.resultno==0){
                $('#footer').html('帐号或密码错！');
            } 
            else location.assign($('#opurl').val()+'center/index');
        },
    }); 
};
var regstaff_sendemail=function(){
    $('#footer').html('');
    var formdata = { email: $('#accountno').val() };
    $.ajax({
        url : $('#opurl').val()+'center/sendstaffemail',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            if(data.resultno==1) $('#footer').html('验证邮件已发送，请检查邮箱获得验证码！');
            if(data.resultno==2) $('#footer').html('验证太频繁，请1小时后再试！');
            if(data.resultno==3) $('#footer').html('系统错误，请重新尝试！');
        },
    }); 
};
var regstaff_setpswd=function(){
    $('#footer').html('');
    var formdata = {
        email: $('#accountno').val(),
        yzm: $('#yzm').val(),
        password: $('#newpassword').val() };
    $.ajax({
        url : $('#opurl').val()+'center/setstaffpassword',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            if(data.resultno==1) $('#footer').html('设置密码成功！');
            if(data.resultno==2) $('#footer').html('验证码错误！');
        },
    }); 
};

//Center
var sactree_save=function(i){
    $('#footer').html('');
    var formenuv=0;
    if($('#formenu_'+i).is(':checked')){formenuv=1;}
    var forentryv=0;
    if($('#forentry_'+i).is(':checked')){forentryv=1;}
    var formdata = {
        id: i,
        name: $('#name_'+i).val(),
        action: $('#action_'+i).val(),
        formenu: formenuv,
        forentry: forentryv,
        };
    $.ajax({
        url : $('#opurl').val()+'center/save_sactree',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#footer').html('保存成功！');
        },
    }); 
};
var sactree_addson=function(i){
    var formdata = { id: i };
    $.ajax({
        url : $('#opurl').val()+'center/addson_sactree',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            location.assign($('#opurl').val()+'center/sactree');
        }
    }); 
};
var sactree_addbrother=function(i){
    var formdata = { id: i };
    $.ajax({
        url : $('#opurl').val()+'center/addbrother_sactree',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            location.assign($('#opurl').val()+'center/sactree');
        }
    }); 
};
var sactree_move=function(i,j){
    var formdata = { id: i,
        samelayer: j };
    $.ajax({
        url : $('#opurl').val()+'center/move_sactree',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            location.assign($('#opurl').val()+'center/sactree');
        }
    }); 
};
var sactree_delete=function(i){
    $('#footer').html('');
    var formdata = { id: i };
    $.ajax({
        url : $('#opurl').val()+'center/delete_sactree',
        type : 'post',
        data : formdata,
       	success : function(data, textStatus, jqXHR)
        {
            $('#itemdiv_'+i).remove();
            $('#footer').html('删除成功！');
        }
    }); 
};
var msbase_save=function(i){
    $('#footer').html('');
    var formdata = {
        id: i,
        name: $('#name_'+i).val(),
        url: $('#url_'+i).val(),
        port: $('#port_'+i).val(),
        user: $('#user_'+i).val(),
        pass: $('#pass_'+i).val(),
        };
    $.ajax({
        url : $('#opurl').val()+'center/save_msbase',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#footer').html('保存成功！');
        },
    }); 
};
var msproduce_save=function(i){
    $('#footer').html('');
    var formdata = {
        id: i,
        name: $('#name_'+i).val(),
        url: $('#url_'+i).val(),
        port: $('#port_'+i).val(),
        user: $('#user_'+i).val(),
        pass: $('#pass_'+i).val(),
        };
    $.ajax({
        url : $('#opurl').val()+'belstar/save_msproduce',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#footer').html('保存成功！');
        },
    }); 
};
var customer_save=function(i){
    $('#footer').html('');
    var isactivev=0;
    if($('#isactive_'+i).is(':checked')){isactivev=1;}
    var formdata = {
        id: i,
        name: $('#name_'+i).val(),
        code: $('#code_'+i).val(),
        memo: $('#memo_'+i).val(),
        scaleout: $('#scaleout_'+i).val(),
        isactive: isactivev,
        msbase_id: $('#msbase_id_'+i).val(),
        };
    $.ajax({
        url : $('#opurl').val()+'center/save_customer',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#footer').html('保存成功！');
        },
    }); 
};
var opcenter_save=function(i){
    $('#footer').html('');
    var isvirtualv=0;
    if($('#isvirtual_'+i).is(':checked')){isvirtualv=1;}
    var isactivev=0;
    if($('#isactive_'+i).is(':checked')){isactivev=1;}
    var formdata = {
        id: i,
        name: $('#name_'+i).val(),
        code: $('#code_'+i).val(),
        memo: $('#memo_'+i).val(),
        isvirtual: isvirtualv,
        isactive: isactivev,
        postcodeprefix: $('#postcodeprefix_'+i).val(),
        addressee: $('#addressee_'+i).val(),
        postcode: $('#postcode_'+i).val(),
        address: $('#address_'+i).val(),
        email: $('#email_'+i).val(),
        tel: $('#tel_'+i).val(),
        mobile: $('#mobile_'+i).val(),
        };
    $.ajax({
        url : $('#opurl').val()+'center/save_opcenter',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#footer').html('保存成功！');
        },
    }); 
};
var expand_height=function(theo,i,hmrem){
    $('#'+theo+'_'+i).height(hmrem);
}
var staff_save=function(i){
    $('#footer').html('');
    var isactivev=0;
    if($('#isactive_'+i).is(':checked')){isactivev=1;}
    var formdata = {
        id: i,
        name: $('#name_'+i).val(),
        accountno: $('#accountno_'+i).val(),
        email: $('#email_'+i).val(),
        mobile: $('#mobile_'+i).val(),
        isactive: isactivev,
        opcenter_id: $('#opcenter_id_'+i).val(),
        };
    $.ajax({
        url : $('#opurl').val()+'center/save_staff',
        type : 'post',
        data : formdata,
        dataType : 'json',
       	success : function(data, textStatus, jqXHR)
        {
            $('#footer').html('保存成功！');
        },
    }); 
};

$(document).ready(function(){
    var thewidth=$(window).width();
    var theheight=$(window).height();
    if(theheight < 600){
        $('#htmlid').css('font-size','72.5%');
    }else if(theheight < 750){
        $('#htmlid').css('font-size','80%');
    }else if(theheight < 1000){
        $('#htmlid').css('font-size','90%');
    }else{
        if(thewidth <800){
            $('#htmlid').css('font-size','100%');
        }else if(thewidth <1000){
            $('#htmlid').css('font-size','125%');
        }else{
            $('#htmlid').css('font-size','150%');
        }
    }; 

});
