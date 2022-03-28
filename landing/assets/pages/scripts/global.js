var isMobile = false;

if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;

/* Format Rupiah */
Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};
var rajamobil = {
    base_url: base_url
}
var ho = {
    base_url: base_url,
    init: function() {
        this.home_slider();
        this.body_clock();
        this.dealerProduct();
        this.dealerPrice();
        this.loadMoreBanner();
        this.loadMoreNews();
        this.loadMoreGallery();
        this.colorChange();
        this.defaultSpecification();
        this.specification();
        this.downloadFile();
        this.downloadAccessories();
        this.selectModel();
        this.insertBookingService();
        this.resetBookingService();
    },
    home_slider: function() {
        jssor_1_slider_init = function() {
            var jssor_1_SlideshowTransitions = [
                // { $Duration: 500, $Delay: 12, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2049, $Easing: $Jease$.$OutQuad },
                // { $Duration: 500, $Delay: 40, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $SlideOut: true, $Easing: $Jease$.$OutQuad },
                { $Duration: 1000, x: -0.2, $Delay: 20, $Cols: 16, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: { $Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad }, $Opacity: 2, $Outside: true, $Round: { $Top: 0.5 } },
                //{ $Duration: 1600, y: -1, $Delay: 40, $Cols: 24, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: $Jease$.$OutJump, $Round: { $Top: 1.5 } },
                // { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 16, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $Jease$.$InWave, $Top: $Jease$.$InWave, $Clip: $Jease$.$OutQuad }, $Round: { $Left: 1.3, $Top: 2.5 } },
                { $Duration: 1500, x: 0.3, y: -0.3, $Delay: 20, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $Jease$.$InJump, $Top: $Jease$.$InJump, $Clip: $Jease$.$OutQuad }, $Round: { $Left: 0.8, $Top: 2.5 } },
                //   { $Duration: 1500, x: 0.3, y: -0.3, $Delay: 20, $Cols: 10, $Rows: 5, $Opacity: 2, $Clip: 15, $During: { $Left: [0.1, 0.9], $Top: [0.1, 0.9] }, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $Jease$.$InJump, $Top: $Jease$.$InJump, $Clip: $Jease$.$OutQuad }, $Round: { $Left: 0.8, $Top: 2.5 } }
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $Cols: 1,
                $Align: 0,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("ho_slider", jssor_1_options);
            var MAX_WIDTH = 1400;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

        };

        if ($("#ho_slider").length > 0) {
            jssor_1_slider_init();
        }


    },

    dealerProduct: function() {
        $('.bodyType').on('click', function() {
            $.ajax({
                url: base_url+'/dealer-product',
                type: "POST",
                data: {
                    'bodyType' : this.getAttribute('data-bodyType')
                }
            }).done(function(result) {
                $('.content-product').html(result)
            });	
        })
    },

    dealerPrice: function() {
        var url = base_url.replace("dealer-pricelist","");
        $('.bodyTypePrice').on('click', function() {
            $.ajax({
                url: url+'dealer-price',
                type: "POST",
                data: {
                    'typeId' : this.getAttribute('data-typeId'),
                    'bodyType' : this.getAttribute('data-body')
                }
            }).done(function(result) {
                $('.content-product').html(result)
            }); 
        })
    },

    downloadFile: function(){
        var url = base_url.replace("dealer-pricelist","");
        $('.downloadPdf').on('click', function() {
            console.log(url);
            $.ajax({
                url: url+'download-file',
                type: "POST",
            }).done(function(result) {
                window.location = url+'download-file';
            }); 
        })
    },

    downloadAccessories: function(){
        var url = base_url.replace("dealer-pricelist","");
        $('.downloadAccessories').on('click', function() {
            console.log(url);
            $.ajax({
                url: url+'download-accessories',
                type: "POST",
            }).done(function(result) {
                window.location = url+'download-accessories';
            }); 
        })
    },

    loadMoreBanner: function() {
        $(document).on('click', '.banner-load-more', function() {
            var lastId = this.getAttribute('data-lastid');

            $.ajax({
                url: base_url+'/more-data',
                type: "POST",
                data: {
                    'lastId' : lastId,
                    'categoryId' : 1
                }
            }).done(function(html) {
                $('.lastid'+lastId).remove().empty();
                $('.dealer-list-promo .row').append(html);
            });	
        })
    },

    loadMoreNews: function() {
        $(document).on('click', '.news-load-more', function() {

            var lastId = this.getAttribute('data-lastid');
            
            $.ajax({
                url: base_url+'/more-data',
                type: "POST",
                data: {
                    'lastId' : lastId,
                    'categoryId' : 2
                }
            }).done(function(html) {
                $('.lastid'+lastId).remove().empty();
                $('.dealer-list-promo .row').append(html);
            });	
        })
    },

    loadMoreGallery: function() {
        $(document).on('click', '.more-gallery', function() {
            var lastId = this.getAttribute('data-lastid');
            var $methods = $('#aniimated-thumbnials');
            $methods.lightGallery();

            $.ajax({
                url: base_url+'/more-gallery',
                type: "POST",
                data: {
                    'lastId' : lastId
                },
                beforeSend: function( xhr ) {
                    $('.more-gallery').addClass('disabled');
                }
            }).done(function(html) {
                $('#aniimated-thumbnials').append(html);
                const more = document.querySelector(".more-gallery");
                var dd = document.querySelectorAll('#last-id');
                var lasted;
                dd.forEach((link, index) => {
                    lasted = link.value; 
                });
                
                more.dataset.lastid = lasted; //set data attribute after click more
                var no = 0;
                var navLink = document.querySelectorAll('#aniimated-thumbnials div a img');
                navLink.forEach((link, index) => {
                    no++;
                });
                
                if($("#total-id").val() == no){
                    $(".more-gallery").css('display','none');
                    // $('.lastid'+lastId).remove().empty();
                }
                $('.more-gallery').removeClass('disabled');
                
                //destroy lightgallery
                try{$methods.data('lightGallery').destroy(true);}catch(ex){};
                $methods.lightGallery();
            });	
        })
    },


    colorChange : function() {
        $('.colorOptions').on('click', function() {
            $(this).addClass("color_selected").siblings('.color_selected').removeClass("color_selected");
            $('.text-center .car').attr('src',this.getAttribute('data-image'));
            $('.warna-product > h5').text(this.getAttribute('data-warna'));
        })
    },

    defaultSpecification : function() {
        var typeId = $(".typeSelect option:first").val();
        
        if(typeId != undefined) {
            ho.dataSpecification(typeId)
        }
    },

    specification : function () {
        $('.typeSelect').on('change', function() {
            ho.dataSpecification($(this).val());
        })
    },

    dataSpecification: function(typeId) {
        $.ajax({
            url: base_url+'/data-specification',
            type: "POST",
            data: {
                'typeId' : typeId
            },
            beforeSend : function() {
                $('.detail-product').html('<img src="https://rajamobil.s3.ap-southeast-1.amazonaws.com/component/spinner.gif" style="height:80px; width:80px; margin:auto;">')
            }
        }).done(function(html) {
            $('.detail-product').html(html)
        });	
    },

    selectModel: function () {
        $('.selecModel').on('change', function() {
            var model_name = $(this).find(':selected').attr('data-model-name');
            $('#model_name').val(model_name)
            var modelId = $(this).val();
            if (base_url.includes("booking-service","")) {
                var url = base_url.replace("booking-service","");
            } else if (base_url.includes("konsultasi-pembelian","")){
                var merek_name = $(this).find(':selected').attr('data-merek-name');
                $('#merek_name').val(merek_name)
                var url = base_url.replace("konsultasi-pembelian","");
            }
            $.ajax({
                url: url+'select-model',
                type: "POST",
                data: {
                    'modelId' : modelId
                },
            }).done(function(html) {
                $('.carType').html(html)
            });
        })
    },
    resetBookingService: function() {
        $('.btn-reset-booking-service').on('click', function() {
            $('#serve-dealer').val('');
            $('#id_client').val('');
            $('#serve-product').val('');
            $('#model_name').val('');
            $('#serve-product-type').val('');
            $('#serve-nopol').val('');
            $('#serve-stnk').val('');
            $('#serve-typeservice').val('');
            $('#serve-lainnya').val('');
            $('#serve-tanggal').val('');
            $('#serve-time').val('');
            $('#serve-masalah').val('');
            $('#serve-nama').val('');
            $('#serve-email').val('');
            $('#serve-nohp').val('');
        })
    },
    insertBookingService: function() {
        $('.selectDealer').on('change', function() {
            var id_client = $(this).find(':selected').attr('data-client');
            $('#id_client').val(id_client)
        })
        $('.btn-booking-service').on('click', function() {
            if ($("#serve-dealer").val() == ' ' || $("#serve-dealer").val() == '') {
                var dealer = 1;
                $('#val-dealer')[0].style.display = 'block';
            } else {
                var dealer = 2;
                $('#val-dealer')[0].style.display = 'none';
            }
            if ($("#serve-product").val() == ' ' || $("#serve-product").val() == '') {
                var product = 1;
                $('#val-product')[0].style.display = 'block';
            } else {
                var product = 2;
                $('#val-product')[0].style.display = 'none';
            }
            if ($("#serve-product-type").val() == ' ' || $("#serve-product-type").val() == '') {
                var producttype = 1;
                $('#val-product-type')[0].style.display = 'block';
            } else {
                var producttype = 2;
                $('#val-product-type')[0].style.display = 'none';
            }
            if ($("#serve-nama").val() == ' ' || $("#serve-nama").val() == '' || $.trim($("#serve-nama").val()).length == 0) {
                var nama = 1;
                $('#val-nama')[0].style.display = 'block';
            } else {
                var nama = 2;
                $('#val-nama')[0].style.display = 'none';
            }
            if ($("#serve-email").val() == ' ' || $("#serve-email").val() == '') {
                var email = 1;
                $('#val-email')[0].style.display = 'block';
            } else {
                var email = 2;
                $('#val-email')[0].style.display = 'none';
            }
            if ($("#serve-nohp").val() == ' ' || $("#serve-nohp").val() == '') {
                var nohp = 1;
                $('#val-nohp')[0].style.display = 'block';
            } else {
                var nohp = 2;
                $('#val-nohp')[0].style.display = 'none';
            }
            if ($("#serve-nopol").val() == ' ' || $("#serve-nopol").val() == '') {
                var nopol = 1;
                $('#val-nopol')[0].style.display = 'block';
            } else {
                var nopol = 2;
                $('#val-nopol')[0].style.display = 'none';
            }
            if ($("#serve-stnk").val() == ' ' || $("#serve-stnk").val() == '') {
                var stnk = 1;
                $('#val-stnk')[0].style.display = 'block';
            } else {
                var stnk = 2;
                $('#val-stnk')[0].style.display = 'none';
            }
            if ($("#serve-typeservice").val() == ' ' || $("#serve-typeservice").val() == '') {
                var typeservice = 1;
                $('#val-typeservice')[0].style.display = 'block';
            } else {
                var typeservice = 2;
                $('#val-typeservice')[0].style.display = 'none';
            }
            if ($("#serve-typeservice").val() == ' ' || $("#serve-typeservice").val() == '') {
                var typeservice = 1;
                $('#val-typeservice')[0].style.display = 'block';
            } else {
                var typeservice = 2;
                $('#val-typeservice')[0].style.display = 'none';
            }
            if ($("#serve-tanggal").val() == ' ' || $("#serve-tanggal").val() == '' || $("#serve-time").val() == ' ' || $("#serve-time").val() == '') {
                var tanggal = 1;
                $('#val-tanggal')[0].style.display = 'block';
            } else {
                var tanggal = 2;
                $('#val-tanggal')[0].style.display = 'none';
            }
            if (nama == 2 && dealer == 2 && product == 2&& producttype == 2&& email == 2 && nohp == 2 && nopol == 2 && stnk == 2 && typeservice == 2 && tanggal == 2) {
                //$('form').on('submit', function (e) {
                //    e.preventDefault();
            //if(1==1){
                    var url = base_url.replace("booking-service","");
                    $.ajax({
                        type: 'POST',
                        url: url+'create-booking-service',
                        data: $('form').serialize(),
                        success: function (res) {
                            console.log(res);
                            $('#serve-dealer').val('');
                            $('#id_client').val('');
                            $('#serve-product').val('');
                            $('#model_name').val('');
                            $('#serve-product-type').val('');
                            $('#serve-nopol').val('');
                            $('#serve-stnk').val('');
                            $('#serve-typeservice').val('');
                            $('#serve-lainnya').val('');
                            $('#serve-tanggal').val('');
                            $('#serve-time').val('');
                            $('#serve-masalah').val('');
                            $('#serve-nama').val('');
                            $('#serve-email').val('');
                            $('#serve-nohp').val('');
                            alert('Data berhasil dikirim');
                        }
                    });
                //});
            }
        })
    },


    body_clock: function() {



    },
    setCookie: function(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    },
    getCookie: function(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
};


$(document).ready(function() 
{
    ho.init();
    owlCustom.init();

    $(".panel-product li:first-child").trigger('click');

    var dealer_name = $("#dealer-name").data('dealer');

    if (dealer_name === "sumberharapan"){
        $('header').hide();
    }
	
	$('#location').click(function()
	{
		$('header').hide();
		$('#ho_slider').hide();
		$('#dealer-main').hide();
		$('#dealer-map').show();
    });

    $('.btn-career').click(function()
	{
        var file = document.getElementById('file-dealer-career');
        console.log(file.files);
        if (!file.files[0]) {
            let lbl = document.getElementById('val-pdf');
            lbl.innerText = 'CV tidak boleh kosong';
            $('#val-pdf').css({'display':'block'});
            return false;
        } else {
            var filePdf = file.files[0];
            if (filePdf.size >= 2100000) {
                let lbl = document.getElementById('val-pdf');
                lbl.innerText = 'File tidak boleh lebih dari 2mb';
                $('#val-pdf').css({'display':'block'});
                return false;
            } else {
                $('#val-pdf').css({'display':'none'});
                return true;
            }
        }
    });

	$('.map-link').click(function()
	{		
		var old_img = $('img.border-active');
		old_img.removeClass('border-active');
			
		var img = $(this).find('img');   
		img.addClass('border-active');

		var city = $(this).attr('href');
		$('#city').val(city);
		
		$('#dealer-list').show();
		$('#gmap-wrapper').show();

        /*		var data = new Object;
                data['city_id'] = $(this).attr('rel');
                
                $.ajax({
                    url: '/default/dealerlist',
                    dataType: "json",
                    type: "POST",
                    data: data,
                }).done(function(result) {
                    var html = "";
                    $.each(result, function(index, data) 
                    {
                        html += '<div class="row">';
                        html += '<div class="col-sm-6 col-xs-12">';
                        html += '<p class="dealer-name"><i class="glyphicon glyphicon-map-marker"></i> ' + data['nama'] + '</p>';
                        html += '<p>' + data['alamat'] + '</p>';
                        html += '<p>Telepon: ' + data['no_telepon'] + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-6 col-xs-12">';
                        html += '<a href="' + data['gmaps_link'] + '" class="btn btn-select"><i class="glyphicon glyphicon-map-marker"></i> Lihat Dealer</a>';
                        html += '&nbsp;&nbsp;&nbsp;';
                        html += '<a href="tel:' + data['no_telepon'] + '" class="btn btn-select"><i class="glyphicon glyphicon-earphone"></i> Hubungi Dealer</a>';
                        html += '</div>';
                        html += '</div>';
                    });
                    
                    $('#dealer-list').html(html);
                });		
        */		
    });
    
    $(".click-detail").click(function(e){
        if($(".click-close").length === 0){

            $(".home-seo-content").css("max-height", "max-content");
            
            $(this).html(" Tutup Selengkapnya <i class=\"fa fa-caret-up\" aria-hidden=\"true\"></i>");
            $(this).addClass("click-close");
        } else {
            $(".home-seo-content").css("max-height", "115px");
            
            $(this).html("Selengkapnya <i class=\"fa fa-caret-down\" aria-hidden=\"true\"></i>");
            $(this).removeClass("click-close");
        }
    });
    $(".click-event").click(function(e){
        e.preventDefault();
        var data = $(this).parent('form').serialize();
        var url = rajamobil.base_url + "/ajax-post-event";
        console.log('url');
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            beforeSend: (send) => {
                // console.log(url);
            },
            success: (data) => {
                //window.location.reload();
              //  console.log(data);
            }
        });
    });
    $('#konsul-dealer').on('change', function() {
        var city_dealer = $(this).find(':selected').attr('data-city');
        $('#konsul-city-dealer').val(city_dealer)
    });
    $('.btn-reset-konsultasi-beli').on('click', function() {
        $(this).prop('checked',false);
        $('#konsul-nama').val('');
        $('#konsul-alamat').val('');
        $('#konsul-nohp').val('');
        $('#konsul-email').val('');
        $('#konsul-dealer').val('');
        $('#konsul-product').val('');
        $('#konsul-producttype').val('');
        $('#konsul-pertanyaan').val('');
    });
    $('#serve-nama').on('keypress', function(e) {
        
    });
});