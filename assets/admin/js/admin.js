/**
 * Created by Administrator on 6/8/2015.
 */
(function($) {
    "use strict";
    $(document).ready(function() {


        //------- Add item banner slider cat -------------------

        /* ADD DESTINATION */
        $('.block-banner-cat').each(function () {
            var $wrapper = $('.list-item-banner-cat', this);
            var i=1;
            $(".s7upf-add-item-banner", $(this)).click(function (e) {
                i++;

                var i = Number($(this).parents('.block-banner-cat').find('.item-banner-slider-cat').last().attr('data-key'))+1;

                $($wrapper).append('<div class="item-banner-slider-cat" data-key="'+i+'"><div class="header-item"><h2 class="title-item">Item '+ i +'</h2><div class="right-h"><a href="#" class="s7upf-remover-item-banner"><i class="fa fa-trash-o" aria-hidden="true"></i></a><a href="#" class="show-hide"><i class="fa fa-plus" aria-hidden="true"></i></a></div></div><div class="content-item"><label>Image banner</label><div class="wrap-metabox"><input name="banner-product-cat-item['+ i +'][img]" type="text" class="sv-image-value" value=""> </input><a class="btn btn-primary sv-button-upload"><i class="fa fa-plus" aria-hidden="true"></i></a><a class="btn btn-default sv-button-remove"><i class="fa fa-minus" aria-hidden="true"></i></a><div class="live-previews"></div></div><label>Banner info</label><textarea name="banner-product-cat-item['+ i +'][info]" type="text" value="" rows="4" cols="40"></textarea></div></div>');
                $('.sv-button-upload').on('click',function () {
                    var send_attachment_bkp = wp.media.editor.send.attachment;
                    var seff = $(this);
                    wp.media.editor.send.attachment = function (props, attachment) {
                        seff.parent().find('.live-previews').html('<img src="'+attachment.url+'" />');
                        seff.parent().find('input.sv-image-value').val(attachment.url);
                        wp.media.editor.send.attachment = send_attachment_bkp;
                    }
                    wp.media.editor.open();
                    return false;
                });

            });

            $($wrapper).on("click", ".s7upf-remover-item-banner", function (e) { //user click on remove text
                if (confirm("Press OK to delete section, Cancel to leave") == true) {
                    e.preventDefault(); $(this).parents('.item-banner-slider-cat').remove();
                }else {
                    return false;
                }

            })
            $('.item-banner-slider-cat .content-item').hide();
            $($wrapper).on("click", ".show-hide", function (e) { //user click on remove text

                $(this).parents('.block-banner-cat').find('.item-banner-slider-cat .content-item').not($(this).parents('.item-banner-slider-cat').find('.content-item')).hide('slow');
                $(this).parents('.block-banner-cat').find('.item-banner-slider-cat .show-hide').find('i').removeClass('fa-minus').addClass('fa-plus');

                e.preventDefault(); $(this).parents('.item-banner-slider-cat').find('.content-item').toggle('slow');
                if($(this).find('i').hasClass('fa-plus')){
                    $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
                }else{
                    $(this).find('i').removeClass('fa-minus').addClass('fa-plus');

                }
            })

        });
        $('.block-banner-cat .item-banner-slider-cat').each(function () {
            var value_img = $(this).find('.sv-image-value').val();
            if(value_img==''){
                $(this).find('.sv-button-remove').hide();
            }
        });


        //--------------------------------------------------
        //------- Check hide show option product cat ---------

        $('.option-check-select').hide();
        $('.s7upf_check_select select').change(function(){
            var var_select = $(this).val();
            $('.option-check-select').each(function () {
                var data_byoption = $(this).data('byselect');
                console.log(var_select1);
                if(var_select == data_byoption) {
                    $(this).show('slow');
                } else {
                    $(this).hide('slow');
                }
            })
        });
        var var_select1 = $('tr.s7upf_check_select select').val();
        $('tr.option-check-select').each(function () {
            var data_byoption = $(this).data('byselect');
            if(var_select1 == data_byoption) {
                $(this).show('slow');
            } else {
                $(this).hide('slow');
            }
        })
        //---------------

        $('.sv_iconpicker').iconpicker();
        if($('#term-color').length>0){
            $( '#term-color' ).wpColorPicker();
        }

        //This for VC Elements
        $(document).on('click','div.sv_iconpicker input[type=text]',function(){

            if(!$(this).hasClass('st_icp_inited'))
            {
                $(this).iconpicker({
                    'container':'body'
                });

                $(this).addClass('st_icp_inited').data('iconpicker').show();
            }
        });
        $(document).on('click','input.sv_iconpicker',function(){

            if(!$(this).hasClass('st_icp_inited'))
            {
                $(this).iconpicker({
                    'container':'body'
                });
                $(this).parent().parent().attr('style','overflow:inherit !important');
                $(this).addClass('st_icp_inited').data('iconpicker').show();
            }
        });

        $('.sv-remove-item').on('click',function () {
            $(this).parent().remove();
            return false;
        });
        $('.sv-button-remove-upload').on('click',function () {
            $(this).parent().find('img').attr('src','');
            $(this).parent().find('input').attr('value','');
            return false;
        });
        //end

        $('.sv-button-upload').on('click',function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var seff = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {
                seff.parent().find('.live-previews').html('<img src="'+attachment.url+'" />');
                seff.parent().find('input.sv-image-value').val(attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open();
            return false;
        });

        $('.sv-button-remove').on('click',function () {
            $(this).parent().find('.live-previews').html('');
            $(this).parent().find('input.sv-image-value').val('');
            return false;
        });



        $('.sv-button-upload-img').on("click",function(options){
            var default_options = {
                callback:null
            };
            options = $.extend(default_options,options);
            var image_custom_uploader;
            var self = $(this);
            //If the uploader object has already been created, reopen the dialog
            if (image_custom_uploader) {
                image_custom_uploader.open();
                return false;
            }
            //Extend the wp.media object
            image_custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: true
            });
            //When a file is selected, grab the URL and set it as the text field's value
            image_custom_uploader.on('select', function() {
                var selection = image_custom_uploader.state().get('selection');
                var ids = [], urls=[];
                selection.map(function(attachment)
                {
                    attachment  = attachment.toJSON();
                    ids.push(attachment.id);
                    urls.push(attachment.url);

                });
                var img_prev = '';
                for(var i=0;i<urls.length;i++)
                {
                    img_prev += '<img src="'+urls[i]+'" style="width:100px; height:100px; padding:5px;">';
                }
                if(img_prev!='')
                    self.parent().find(".img-previews").html(img_prev);
                self.parent().find("input.multi-image-url").val( JSON.stringify(urls) );


                if (typeof options.callback == 'function'){
                    options.callback({'self':self,'urls':urls});

                };


            });
            image_custom_uploader.open();
            return false;
        });

    });


    $('body').on('click', '.sv-del', function(e)
    {
        e.preventDefault();
        $(this).parent().remove();
    })
})(jQuery);