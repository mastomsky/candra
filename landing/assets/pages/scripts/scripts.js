$(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    
     /* 1 carousel */
    $('#carousel-1').carousel({
        interval: 4000,
        wrap: true,
        keyboard: true
    });
});
// $(document).ready(function(){
//     $('.slick-carousel').slick({
//       speed: 500,
//       slidesToShow: 4,
//       autoplay: true,
//       slidesToScroll: 1,
//       autoplaySpeed: 2000,
//       dots:true,
//       centerMode: true,
//       responsive: [{
//         breakpoint: 1024,
//         settings: {
//           slidesToShow: 3,
//           slidesToScroll: 1,
//           // centerMode: true,
  
//         }
  
//       }, {
//         breakpoint: 800,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 2,
//           dots: true,
//           infinite: true,
  
//         }
//       },  {
//         breakpoint: 480,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1,
//           dots: true,
//           infinite: true,
//           autoplay: true,
//           autoplaySpeed: 2000,
//         }
//       }]
//     });
//   });

$(document).ready(function() {
    filter_data(1);

    function filter_data(page) {
        $('.filter_data').html('<div class="text-center" id="loading" style="" ></div>');
        var action = 'fetch_data_vehicles';
        var category = get_filter('category');
        $.ajax({
            url: base_url + 'Landing/fetch_data_vehicles/' + page,
            method: "POST",
            dataType: "JSON",
            data: {
                action: action,
                category: category,
            },
            success: function(data) {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
            }
        })
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '#pagination li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').click(function() {
        filter_data(1);
    });
    // $('#price_range').slider( {
    //     range: true,
    //     min: 100000000,
    //     max: 2216200000,
    //     values: [100000000, 2216200000],
    //     step: 500,
    //     stop: function(event, ui) {
    //         event.preventDefault();
    //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
    //         $('#hidden_minimum_price').val(ui.values[0]);
    //         $('#hidden_maximum_price').val(ui.values[1]);
    //         filter_data(1);
    //     }

    // });

}); 
// Search Ajax
$(document).ready(function() {

    load_data();

    function load_data(query) {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        $.ajax({
            url: base_url + 'Landing/fetch_search',
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('.filter_data').html(data);
            }
        })
    }

    $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
    $('#product').change(function(){
        var product_id = $('#product').val();
        if(product_id != '')
        {
         $.ajax({
          url: base_url +'Landing/get_product_type',
          method:"POST",
          data:{product_id:product_id},
          success:function(data)
          {
           $('#product_type').html(data);
          }
         });
        }
        else
        {
         $('#product_type').html('<option value="">Product Type</option>');
        }
       });
    
});

// Ajax Accordion by id

$(document).ready(function() {
    promo_toyota(1);
    function promo_toyota(page) {
        $('.promo_toyota').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data_promo';
        $.ajax({
            url: base_url + 'Landing/fetch_data_promo/' + page,
            method: "POST",
            dataType: "JSON",
            data: {
                action: action,
            },
            success: function(data) {
                $('.promo_toyota').html(data.promo_list);
                $('#pagination_link_promo').html(data.pagination_link_promo);
            }
        })
    }
    $(document).on('click', '#pagination_link_promo li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        promo_toyota(page);
    });

});
$(document).ready(function() {
    function load_vehicles_model(id,data_tab) {
        $.ajax({
            url: base_url + 'Landing/vehicles_model',
            method: "POST",
            data: {
                id: id,
                data_tab : data_tab
            },
            success: function(data) {
                $('#vehicles_model').html(data);
            }

        });
    }

    load_vehicles_model(1);
    $('.print-tab-menu li').click(function() {
        var category_id = $(this).attr("id");
        var data_tab = $(this).attr("data-tab-menu");
        load_vehicles_model(category_id);

    })

        $('.typeSelect').change(function(){  
        var vehicles = $('#vehicles_id').val();  
        var type_id = $(this).val(); 

        $.ajax({  
             url: base_url + 'Landing/data_specification',  
             method:"POST",  
             data:{
                 vehicles_id: vehicles,
                 type_id:type_id,
                },  
                
                success:function(data){  
               
                  $('.detail-product').html(data);  
             }  
            });  
        });  
        
        $('.typeSelect').change(function(){  
        var vehicles = $('#vehicles_id').val();  
        var type_id = $(this).val(); 

        $.ajax({  
             url: base_url + 'Landing/harga_type',  
             method:"POST",  
             data:{
                 vehicles_id: vehicles,
                 type_id:type_id,
                },  
                
                success:function(data){  
               
                  $('.harga').html(data);  
             }  
            });  
        });  
})

$(function() {
    $('.gridtab-2').gridtab({
        grid: 4,
        config: {
            layout: 'tab'
        },
        callbacks: {
            open: function() {
                console.log('open');
            },
            close: function() {
                console.log('close');
            }
        },
        responsive: [{
            breakpoint: 991,
            settings: {

                grid: 3,
            }
        }, {
            breakpoint: 767,
            settings: {
                grid: 2,
            }
        }, {
            breakpoint: 520,
            settings: {
                grid: 1,
            }
        }]
    });
    $.each($(".print-tab .print-tab-menu > li"), function(index, value) {
        var menu = $(value).data('tab-menu');
        var tabID = $(value).parent().parent().data('tab-id');
        var hash = window.location.hash.split("#").join('');

        if (hash.length > 0) {

            if (menu == hash) {
                $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-menu > li[data-tab-menu="' + menu + '"]').addClass('active');
                $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-content > div[data-tab-content="' + menu + '"]').addClass('view');
            }

        } else {
            $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-menu > li:eq(0)').addClass('active');
            $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-content > div:eq(0)').addClass('view');
        }
    });



    $(".print-tab .print-tab-menu > li").click(function(event) {
        var $this = $(this),
            $data = $this.data('tab-menu'),
            $tabID = $this.parent().parent().data('tab-id');
        if (!$(this).hasClass("active")) {

            window.location.hash = $data;

            $('.print-tab[data-tab-id="' + $tabID + '"] .print-tab-menu > li').removeClass('active');
            $(this).addClass('active');

            $('.print-tab[data-tab-id="' + $tabID + '"] .print-tab-content > div.view').removeClass('view');
            $('.print-tab[data-tab-id="' + $tabID + '"] .print-tab-content > div[data-tab-content="' + $data + '"]').addClass('view');
        }
    });
});
 // Whatsapp Send dan post ajax
 $(document).on('click', '.send_booking', function() {
    var input_blanter = document.getElementById('email');
   
    var text_info = document.getElementById('text-info');

    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
        phone = '6281357199161',
        walink2 = 'Halo saya ingin booking service mobil saya*',
        text_yes = 'Terkirim.',
        text_no = 'Isi semua Formulir lalu klik Submit.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }

    if ("" != input_blanter.value) {

        /* Call Input Form */
        var input_product = $("#product :selected").text(),
            input_nama = $("#nama").val(),
            input_email = $("#email").val(),
            input_no = $("#wa_number").val(),
            input_dealer = $("#dealer").val(),
            input_type = $("#product_type :selected").text(),
            input_nopol = $("#nopol").val(),
            input_stnk = $("#nama_stnk").val(),
            input_type_service = $("#type_service").val(),
            input_tanggal = $("#tanggal_service").val(),
            input_jam = $("#jam_service").val(),
            input_masalah = $("#masalah").val();

        /* Final Whatsapp URL */
        var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '*PERSONAL INFORMATION*' + '%0A' +
            '*Nama* : ' + input_nama + '%0A' +
            '*Email* : ' + input_email + '%0A' +
            '*No Handphone* : ' + input_no + '%0A' +'%0A' +
            '*BOOKING INFORMATION*' + '%0A' +
            '*Dealer* : ' + input_dealer + '%0A' +
            '*Product* : ' + input_product + '%0A' +
            '*Product Type* : ' + input_type + '%0A' +
            '*No Polisi* : ' + input_nopol + '%0A' +
            '*Atas Nama Pada STNK* : ' + input_stnk + '%0A' +
            '*Type Service* : ' + input_type_service + '%0A'+
            '*Tanggal* : ' + input_tanggal + '%0A'+
            '*Jam* : ' + input_jam + '%0A'+
            '*Masalah pada mobil anda* : ' + input_masalah + '%0A';

        /* Whatsapp Window Open */
        window.open(blanter_whatsapp, '_blank');
        text_info.innerHTML = '<span class="yes">' + text_yes + '</span>';
    } else {
        text_info.innerHTML = '<span class="no">' + text_no + '</span>';
    }
});
 $(document).on('click', '.send_test_drive', function() {
    var input_send = document.getElementById('email');
   
    var text_info = document.getElementById('text-info');

    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
        phone = '6281357199161',
        walink2 = 'Halo saya ingin Booking Test Drive*',
        text_yes = 'Terkirim.',
        text_no = 'Isi semua Formulir lalu klik Submit.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }

    if ("" != input_send.value) {

        /* Call Input Form */
        var input_kebutuhan = $("#kebutuhan").val(),
            input_nama = $("#nama").val(),
            input_email = $("#email").val(),
            input_no = $("#wa_number").val(),
            input_kota = $("#kota").val(),
            input_dealer = $("#dealer").val(),
            input_alamat = $("#alamat").val(),
            input_product = $("#product :selected").text(),
            input_informasi = $("#informasi").val(),
            input_perkiraan = $("#perkiraan :selected").text();

        /* Final Whatsapp URL */
        var send_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '*PERSONAL INFORMATION*' + '%0A' +
            '*Nama* : ' + input_nama + '%0A' +
            '*Alamat* : ' + input_alamat + '%0A' +
            '*No Handphone* : ' + input_no + '%0A' +
            '*Email* : ' + input_email + '%0A' +
            '*Kota* : ' + input_kota + '%0A' +
            '*Dealer* : ' + input_dealer + '%0A' +
            '*Product* : ' + input_product + '%0A%0A' +
            '*TEST DRIVE INFORMATION*' + '%0A' +
            '*Kebutuhan* : ' + input_kebutuhan + '%0A' +
            '*Informasi* : ' + input_informasi + '%0A' +
            '*Perkiraan Pembelian* : ' + input_perkiraan + '%0A';

        /* Whatsapp Window Open */
        window.open(send_whatsapp, '_blank');
        text_info.innerHTML = '<span class="yes">' + text_yes + '</span>';
    } else {
        text_info.innerHTML = '<span class="no">' + text_no + '</span>';
    }
});
 $(document).on('click', '.konsultasi_pembelian', function() {
    var input_send = document.getElementById('email');
   
    var text_info = document.getElementById('text-info');

    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
        phone = '6281357199161',
        walink2 = 'Halo saya ingin konsultasi mobil*',
        text_yes = 'Terkirim.',
        text_no = 'Isi semua Formulir lalu klik Submit.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }

    if ("" != input_send.value) {

        /* Call Input Form */
        var input_kebutuhan = $("#kebutuhan :selected").text(),
            input_nama = $("#nama").val(),
            input_email = $("#email").val(),
            input_no = $("#wa_number").val(),
            input_kota = $("#kota").val(),
            input_dealer = $("#dealer").val(),
            input_alamat = $("#alamat").val(),
            input_product = $("#product :selected").text(),
            input_informasi = $("#informasi").val(),
            input_perkiraan = $("#perkiraan :selected").text();

        /* Final Whatsapp URL */
        var send_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '*PERSONAL INFORMATION*' + '%0A' +
            '*Nama* : ' + input_nama + '%0A' +
            '*Alamat* : ' + input_alamat + '%0A' +
            '*No Handphone* : ' + input_no + '%0A' +
            '*Email* : ' + input_email + '%0A' +
            '*Kota* : ' + input_kota + '%0A' +
            '*Dealer* : ' + input_dealer + '%0A' +
            '*Product* : ' + input_product + '%0A%0A' +
            '*TEST DRIVE INFORMATION*' + '%0A' +
            '*Kebutuhan* : ' + input_kebutuhan + '%0A' +
            '*Informasi* : ' + input_informasi + '%0A' +
            '*Perkiraan Pembelian* : ' + input_perkiraan + '%0A';

        /* Whatsapp Window Open */
        window.open(send_whatsapp, '_blank');
        text_info.innerHTML = '<span class="yes">' + text_yes + '</span>';
    } else {
        text_info.innerHTML = '<span class="no">' + text_no + '</span>';
    }
});
