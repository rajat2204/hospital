jQuery(function(){


        var EditClientHelpers={
            init:function(){
                EditClientHelpers.clientUpdate();
                EditClientHelpers.otherInfoUpdate();
                // EditClientHelpers.secreterialUpdate();
                EditClientHelpers.feesUpdate();
                EditClientHelpers.accountingSave();
                EditClientHelpers.getAddressList();
                EditClientHelpers.AddressStore();
                EditClientHelpers.auditingSave();
                EditClientHelpers.auditingUpdate();
                EditClientHelpers.auditInfoView();
                EditClientHelpers.auditInfoSave();
                EditClientHelpers.getFormsView();         
                EditClientHelpers.formsSave();
                EditClientHelpers.formsInfoView();
                EditClientHelpers.formsUpdate();
                EditClientHelpers.formsDateSave();
               // EditClientHelpers.getfile();
                EditClientHelpers.searchTable();
                EditClientHelpers.getAccountingView();
                EditClientHelpers.year();
                EditClientHelpers.date();              
                EditClientHelpers.audit();
                EditClientHelpers.checkNumeric();
                EditClientHelpers.selectclient();
                EditClientHelpers.update_form();
                EditClientHelpers.editFormData();
                EditClientHelpers.onlyNumericValidation();
                EditClientHelpers.alphaNumeriValidation();
                EditClientHelpers.tillDate();
                // EditClientHelpers.mobileUnique();
                // EditClientHelpers.emailUnique();
                EditClientHelpers.checkNumericDesimal();
                EditClientHelpers.registerNoUnique();
                jQuery(document).on("click","#link-auditing-tab",function(event){
                    EditClientHelpers.getAuditingView();
                });
                jQuery(document).on("click","#link-forms-tab",function(event){
                    EditClientHelpers.getFormsView();
                });
                jQuery(document).on("click","#link-accounting-tab",function(event){
                    EditClientHelpers.getAccountingView();
                });
                $(document).ready(function() {
                    $('#example').DataTable();
                });
                $(document).ready(function() {
                    $('.fees-table').DataTable();
                });
                $('.numeric').keypress(function (event) {
                    var keycode = event.which;
                    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
                        event.preventDefault();
                    }
                });
                var update_Id = jQuery('#clientId').val();
            },
            getAddressList:function(){ 
                var update_Id = jQuery('#clientId').val();
                    jQuery.ajax({
                        url:"{{route('getAddressList')}}",
                        type:"get",
                        data:{Update_id:update_Id},
                        dataType:'html',
                        success: function(response){     
                            jQuery('#AddressList').html(response) ;
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
            },
            AddressStore:function(){
                jQuery(document).on('submit','#contactformSave',function(){
                    var update_Id = jQuery('#clientId').val();
                    $('#id-button-save-contact').prop('disabled',true); 
                    jQuery.ajax({
                        url:"{{route('address.store')}}",
                        type:"POST",
                        data: jQuery('#contactformSave').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                           ViewHelpers.notify("success",response.message);                               
                              EditClientHelpers.getAddressList();

                              $('#id-button-save-contact').prop('disabled',false); 

                         $('#contactformSave').find('input[type=text]').val('');
                         $('#contactformSave').find('input[type=email]').val('');
                          }
                            }
                            else{
                               if(response.message){
                           ViewHelpers.notify("error",response.message); 
                           }       
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                });
            },

            getFormsView:function(){
                event.preventDefault();
                var selectedId = jQuery("#clientId").val();
                    jQuery.ajax({
                        url:"{{route('formsList',['id'=>$id])}}",
                        type:"GET",
                        data:{id:selectedId},
                        dataType:'html',
                        success: function(response){
                            jQuery('#forms_view_holder').html(response) ;
                            jQuery('.searchTable').DataTable();
                        },
                        error: function(err){
                        alert(err) ;
                        }
                    });
                   return false;
               },
            getAuditingView:function(){
                event.preventDefault();
                var selectedId = jQuery("#clientId").val();
                jQuery.ajax({
                    url:"{{route('auditingList',['id'=>$id])}}",
                    type:"GET",
                    data:{id:selectedId},
                    dataType:'html',
                    success: function(response){
                           jQuery('#auditing_view_holder').html(response) ;
                           jQuery('.searchTable').DataTable();
                       },
                       error: function(err){
                        alert(err) ;
                    }
                });
                return false;
            },
                

                getAccountingView:function(){
                event.preventDefault();
                var selectedId = jQuery("#clientId").val();
                    jQuery.ajax({
                      url:"{{route('accountingList',['id'=>$id])}}",
                        type:"GET",
                        data:{},
                        dataType:'html',
                        success: function(response){
                            jQuery('#accounting_view_holder').html(response) ;
                            jQuery('.searchTable').DataTable();
                        },
                        error: function(err){
                        alert(err) ;
                        }
                    });
                   return false;
               },
               
       

            clientUpdate:function(){
                jQuery(document).on('submit','#clientform',function(event){
                    jQuery.ajax({
                        url:"{{route('companyUpdate',['id'=>$id])}}",
                        type:"POST",
                        data: jQuery('#clientform').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                                   ViewHelpers.notify("success",response.message);
                               }
                               // jQuery('#msgModal_true').modal('show');
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },
            otherInfoUpdate:function(){
                jQuery(document).on('submit','#otherform',function(event){
                    jQuery.ajax({
                        url:"{{route('companyOtherUpdate',['id'=>$id])}}",
                        type:"POST",
                        data: jQuery('#otherform').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                                 ViewHelpers.notify("success",response.message);
                             }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },

            accountingSave:function(){
                jQuery(document).on('submit','#accountingform',function(){
                    jQuery.ajax({
                        url:"{{route('companyServiceAccounting')}}",
                        type:"POST",
                        data: jQuery('#accountingform').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                                ViewHelpers.notify("success",response.message);
                              jQuery('#myModalAccounting').modal('hide');
                              
                              EditClientHelpers.getAccountingView();
                          }
                            }
                            else{
                              jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },
            feesUpdate:function(){
                jQuery(document).on('submit','#feeform',function(event){
                    jQuery.ajax({
                        url:"{{route('companyFeesUpdate',['id'=>$id])}}",
                        type:"POST",
                        data: jQuery('#feeform').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                           ViewHelpers.notify("success",response.message);
                       }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },
            auditingSave:function(){
                jQuery(document).on('submit','#auditingform',function(event){
                    event.preventDefault();  
                    jQuery.ajax({
                        url:"{{route('companyAudit',['id'=>$id])}}",
                        type:"POST",
                        data: jQuery('#auditingform').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                           ViewHelpers.notify("success",response.message);
                                $("#myModal").modal("hide");
                                EditClientHelpers.getAuditingView();
                            }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    return false;
                });
            },
            auditingUpdate:function(){
                jQuery(document).on('submit','#auditingUpdateform',function(event){
                    var updateId = jQuery('#update_id').val();
                    var auditupdate = jQuery("#audit_update").val();
                    jQuery.ajax({
                        url:"{{route('companyAudit',['id'=>$id])}}",
                        type:"POST",
                        data: jQuery('#auditingUpdateform').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                                    ViewHelpers.notify("success",response.message);
                                $("#editAuditingModel").modal("hide");
                                $("#myModal").modal("hide");
                                EditClientHelpers.getAuditingView();
                            }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },

            formsUpdate:function(){
                jQuery(document).on('submit','#formsUpdateForm',function(event){
                    jQuery.ajax({
                        url:"{{route('serviceFormUpdate')}}",
                        type:"GET",
                        data: jQuery('#formsUpdateForm').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                               if(response.message){
                           ViewHelpers.notify("success",response.message);
                               $("#formsModal").modal("hide");
                                $("#serviceEditFormUpdate").modal("hide");  
                                EditClientHelpers.getFormsView();
                            }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                });
            },

            formsSave:function(){
                jQuery(document).on('submit','#formsForm',function(event){
                    jQuery.ajax({
                        url:"{{route('serviveFormAdd',['id'=>$id])}}",
                        type:"GET",
                        data: jQuery('#formsForm').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                                if(response.message){
                           ViewHelpers.notify("success",response.message);
                                $("#serviceEditFormUpdate").modal("hide");
                                $("#formsModal").modal("hide");
                                EditClientHelpers.getFormsView();    
                            }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    }); 
                    return false;     
                });
            },

            auditInfoView:function(){
                jQuery(document).on('click','.auditing_info',function(){
                    var update_Id = jQuery(this).data('id');
                    jQuery('#Audit_update_id').val(update_Id);
                    jQuery("#auditing_info").modal('show');
                    jQuery.ajax({
                        url:"{{route('auditUpdate')}}",
                        type:"GET",
                        data:{Update_id:update_Id},
                        dataType:'json',
                        success: function(response){//debugger;
                            if(response.success){
                             if(response.data){   
                             var value = response.data  ;                                  
                                jQuery('#profit_a').val(value.profit_a);
                                jQuery('#profit_b').val(value.profit_b);
                                jQuery('#corporationTax_a').val(value.corporationTax_a);
                                jQuery('#corporationTax_b').val(value.corporationTax_b);
                                jQuery('#defence_a').val(value.defence_a);
                                jQuery('#defence_b').val(value.defence_b);
                                jQuery('#audit_comment').val(value.audit_comment);
                                jQuery('#audit_progress').val(value.audit_progress);
                                }
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },
            auditInfoSave:function(){
                jQuery(document).on('submit','#auditInfoForm',function(event){
                    jQuery.ajax({
                        url:"{{route('companyAuditInfoUpdate')}}",
                        type:"POST",
                        data: jQuery('#auditInfoForm').serialize(),
                        dataType:'json',
                        success: function(response){
                            if(response.success){
                               if(response.message){
                           ViewHelpers.notify("success",response.message);
                                jQuery("#auditing_info").modal('hide');  
                            }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    }); 
                    return false;     
                });
            },

            formsDateSave:function(){
                jQuery(document).on('submit','#forms_info_add',function(event){
                    jQuery.ajax({
                        url:"{{route('companyServiceFormUpdate')}}",
                        type:"POST",
                        data: jQuery('#forms_info_add').serialize(),
                        dataType:'json',
                        success: function(response){
                             if(response.success){
                               if(response.message){
                           ViewHelpers.notify("success",response.message);
                                jQuery("#form_info").modal('hide');  
                            }
                            }
                            else{
                                jQuery('#msgModal_false').modal('show');
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    }); 
                    return false;    
                });
            },

            formsInfoView:function(){
                jQuery(document).on('click','.forms_info',function(){
                    var update_Id = jQuery(this).data('id');                    
                    jQuery('#forms_info_id').val(update_Id);
                    jQuery("#form_info").modal('show');
                    jQuery.ajax({
                        url:"{{route('formsUpdate')}}",
                        type:"GET",
                        data:{Update_id:update_Id},
                        dataType:'json',
                        success: function(response){   
                            if(response.success){
                             if(response.data){   
                             var value = response.data  ;                                  
                                jQuery('#Date_delivered').val(value.Date_delivered);
                                jQuery('#Date_obtained').val(value.Date_obtained);
                                jQuery('#Comments').val(value.Comments);
                                }
                            }
                        },
                        error: function(err){
                            alert(err) ;
                        }
                    });
                    event.preventDefault();
                    return false;
                })
            },
            
            selectclient:function(){
                jQuery(document).on("click",".client-list-item",function(event){
                    event.preventDefault();
                    var selectedId = jQuery(this).data('id');
                    $('#selected_id').val(selectedId);
                    jQuery("#form_client")[0].submit();
                })
            }
            ,
            year:function(){
                jQuery('.date-own').datepicker({
                    minViewMode: 2,
                    orientation: 'bottom',
                    todayHighlight: true,
                    format: 'yyyy'
                });
            },
            checkNumericDesimal:function () {
                jQuery(".numeriDesimal").keyup(function() {
                    var $this = jQuery(this);
                    $this.val($this.val().replace(/[^\d.]/g, ''));
                });
            },

            alphaNumeriValidation:function () {
                jQuery('.AlphaNumeric').on('keypress',function (e) {
                    var regex = new RegExp("^[a-zA-Z0-9]+$");
                    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                    if (regex.test(str)) {
                        return true;
                    }
                    e.preventDefault();
                    return false;
                });
            },
            onlyNumericValidation:function () {
                jQuery('.Numeric').on('keypress',function (e) {
                    var regex = new RegExp("^[0-9]+$");
                    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                    if (regex.test(str)) {
                        return true;
                    }
                    e.preventDefault();
                    return false;
                });
            },

            searchTable:function () {
                jQuery(document).ready(function() {
                    jQuery('.client-table').DataTable({
                        "aoColumnDefs": [{ "bSortable": false, "aTargets": [1,2,3,6]}],
                    });
                });
            },
            date:function(){
                jQuery('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true,
                });
            },
            tillDate:function(){
                jQuery(".DisableFutureDatepicker").datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true,
                    endDate: "today",
                });
            },
            audit:function(){
                jQuery(document).on('click','.editAudit',function(){
                    jQuery('#year').val(jQuery(this).data('year'));
                    jQuery('#auditStatus').val(jQuery(this).data('status')).change();
                    jQuery('#audit_startDate').val(jQuery(this).data('startdate'));
                    jQuery('#audit_endDate').val(jQuery(this).data('edndate'));
                    jQuery('#audit_review').val(jQuery(this).data('review'));
                    jQuery('#audit_prepared').val(jQuery(this).data('prepared'));
                    jQuery('#audit_final').val(jQuery(this).data('final'));
                    jQuery('#update_id').val(jQuery(this).data('id'));
                    $('#editAuditingModel').modal('show');
                });
            },
            editFormData:function(){
                jQuery(document).on('click','.editForm',function(){
                    var selectedId = jQuery(this).data('id');
                    var update_id = jQuery("#update_value_"+selectedId).val();
                    jQuery('#form_edit_id').val(jQuery(this).data('id'));
                    jQuery('#form_update_year').val(jQuery(this).data('year'));
                    $('#serviceEditFormUpdate').modal('show');
                });
            },

            selectRo:function(){
                jQuery('.category').on('change',function(){
                    console.log('hello');
                    vil.getfile();
                });
            },
            update_form:function () {
                jQuery('#submitUpdateForm').on('click',function () {
                    jQuery.get('formUpdate',{
                        client_id:jQuery('#update_form_client_id').val(),
                        edit_id : jQuery('.updateID').val(),
                        category_id : jQuery('#update_form_category_id').val(),
                        tax_file: jQuery('.tax_file_name').val(),
                        update_year: jQuery('#form_update_year').val(),
                        update_status: jQuery('#form_update_status').val(),
                        '_token': jQuery('meta[name="csrf-token"]').attr('content'),
                    },function(data){
                        if(data == 'ok')
                        {
                           jQuery('#serviceEditFormUpdate').modal('toggle');
                           window.location.reload();
                       }
                       console.log(opt);
                       jQuery('.tax_file').html(opt);
                   });
                });
            },
            // mobileUnique:function () {
            //     jQuery("#Mobile").on('keyup',function () {
            //         var mobile = jQuery('#Mobile').val();
            //         var  id=jQuery(this).data('id');
            //         var  colum=jQuery(this).data('colum');
            //         if(mobile)
            //         {
            //             if(mobile.length > 9 && mobile.length < 16)
            //             {
            //                 jQuery('#mobile_status').html("");
            //                 jQuery('#submit_btn').show();
            //                 jQuery.get('checkUniqueUpdate',{
            //                     mobile:mobile,
            //                     id:id,
            //                     colum:colum,
            //                     '_token': jQuery('meta[name="csrf-token"]').attr('content'),
            //                 },function(response){
            //                     console.log(response);
            //                     jQuery('#mobile_status').html(response);
            //                     if(response=="OK")
            //                     {
            //                         jQuery('#submit_btn').show();
            //                         return true;
            //                     }
            //                     else
            //                     {
            //                         jQuery('#mobile_status').html('Data Alreay exist!');
            //                         jQuery('#submit_btn').hide();
            //                         return false;
            //                     }
            //                 });
            //             }
            //             else
            //             {
            //                 jQuery('#submit_btn').hide();
            //                 jQuery('#mobile_status').html("length must be greater than nine(9) and less than sixteen(16)");
            //             }

            //         }
            //         else
            //         {
            //             jQuery('#mobile_status').html("");
            //             return false;
            //         }
            //     });
            // },
            checkNumeric:function () {
                jQuery("#numeric").keyup(function() {
                    var $this = jQuery(this);
                    $this.val($this.val().replace(/[^\d.]/g, ''));
                });
            },
            // emailUnique:function () {
            //     jQuery("#email").on('keyup',function () {
            //         var email = jQuery('#email').val();
            //         var  id=jQuery(this).data('id');
            //         var  colum=jQuery(this).data('colum');
            //         if(email){
            //             jQuery.get('checkUniqueUpdate',{
            //                 mobile:email,
            //                 id:id,
            //                 colum:colum,
            //                 '_token': jQuery('meta[name="csrf-token"]').attr('content'),
            //             },function(response){
            //                 jQuery('#email_status').html(response);
            //                 if(response=="OK")
            //                 {
            //                     jQuery('#submit_btn').show();
            //                     return true;
            //                 }
            //                 else
            //                 {
            //                     jQuery('#email_status').html('Email Already Exist');
            //                     jQuery('#submit_btn').hide();
            //                     return false;
            //                 }
            //             });
            //         }
            //         else
            //         {
            //             jQuery('#email_status').html("");
            //             return false;
            //         }
            //     });
            // },
            registerNoUnique:function () {
                jQuery("#register").on('keyup',function () {
                    var register_no = jQuery('#register').val();
                    var  id=jQuery(this).data('id');
                    var  colum=jQuery(this).data('colum');
                    if(register_no){
                        jQuery.get('checkRegisterUniqueUpdate',{
                            register_no:register_no,
                            id:id,
                            colum:colum,
                            '_token': jQuery('meta[name="csrf-token"]').attr('content'),
                        },function(response){
                            jQuery('#reg_status').html(response);
                            if(response=="OK")
                            {
                                jQuery('#reg_btn').show();
                                return true;
                            }
                            else
                            {
                                jQuery('#reg_status').html('Register No. Already Exist');
                                jQuery('#reg_btn').hide();
                                return false;
                            }
                        });
                    }
                    else
                    {
                        jQuery('#reg_status').html("");
                        return false;
                    }
                });
            },
            getfile:function(){
                jQuery.get("{{route('getfile')}}",{
                    taxTypeId:jQuery('.category').val(),
                    '_token': jQuery('meta[name="csrf-token"]').attr('content'),
                },function(data){
                    var opt='';
                    jQuery.each(data, function(index,value){
                        opt+='<option value="'+index+'">'+value+'</option>';
                    });
                    console.log(opt);
                    jQuery('.tax_file').html(opt);
                });
            },
        }
        EditClientHelpers.init();
    });