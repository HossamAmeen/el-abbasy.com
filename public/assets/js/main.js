$(document).ready(function () {
    // choses-slider

    AOS.init();
    $(".btnBrint").on("click", function () {
        window.print();
    });

    if ($(".filter_content").length) {
        $(".submenu_parent a").on("click", function () {
            // $(".filter_content .submenu").slideUp();
            $(this)
                .toggleClass("arrow_active")
                .parent()
                .find("> .submenu")
                .slideToggle();
        });
    }

    if ($(".works_filter").length) {
        $(".filter_icon").on("click", function (e) {
            e.preventDefault();
            $(".works_filter").addClass("filtrt_open");
        });

        $(".andel").on("click", function (e) {
            $(".works_filter").removeClass("filtrt_open");
        });
    }

    if ($(".new_our_works").length) {
        $(".new_our_works .submenu_parent .submenu li a").click(function (e) {
            e.preventDefault();
            var target = $(this).attr("data-target");
            $(this).parent().siblings().find("a").removeClass("arrowtransform");
            $(this).addClass("arrowtransform");
            $(".works_parent").removeClass("active_tab");
            $(target).addClass("active_tab");
        });
    }
    // new SimpleBar(document.querySelector('body'));
    /*   if ($(".filter_content").length) {
        $('.submenu_parent a').on('click', function () {
            // $(".filter_content .submenu").slideUp();
            $(this).toggleClass("arrow_active").parent().find("> .submenu").slideToggle();
        })
    }

    if($(".works_filter").length){
        $(".filter_icon").on('click', function(e){
            e.preventDefault();
            $(".works_filter").addClass('filtrt_open')
        })

        $(".andel").on('click', function(e){
            $(".works_filter").removeClass('filtrt_open')
        })
    }*/
    
    
    if($("").length){
        $('.printMe').click(function () {
          window.print();
        }); 
    }


    if ($(".new-work-detisl-slider").length) {
        $(".new-work-detisl-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            loop: true,
            infinite: false,
            focusOnSelect: false,
            arrows: true,
            autoplay: true, 
            // edgeFriction: 1.20,
            autoplaySpeed: 4000,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 524,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    },
                },
            ],
        });
    }

    if($(".sub_serveice_slider").length){
        $(".sub_serveice_slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            loop: false,
            infinite: false,
            focusOnSelect: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 524,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    },
                },
            ],
        });
    }

    if ($(".quta_info_card").length) {
        $(".quta_info_card .half_circle_title").on("click", function () {
            $(this).parent().find(".details_box").slideToglle();
        });
    }

    if ($(".floating_btn_get_quta").length) {
        // $(".floating_btn_get_quta").
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $(".floating_btn_get_quta").fadeIn();
            } else {
                $(".floating_btn_get_quta").fadeOut();
            }
        });

        // if($())
    }

    if ($(".form-group .payment_time").length) {
        $(".payment_time").on("change", function () {
            let payment_value = $(this).val();
            if (payment_value == "now") {
                // payment_value
                $(this)
                    .parent()
                    .parent()
                    .next(".payment_type_parent")
                    .slideDown();
            } else if (payment_value == "later") {
                // payment_value
                $(this)
                    .parent()
                    .parent()
                    .next(".payment_type_parent")
                    .slideUp();
            }
        });
    }

    if ($(".bg-sidenavOpen").length) {
        $(".bg-sidenavOpen").on("click", function () {
            $("#mySidenav").css("right", "-400px");
            $(this).css("display", "none");
            document.body.classList.remove("openMenuActive");
        });
    }
    if ($(".bg-sidenavOpen").length) {
        $(".bg-sidenavOpen").on("click", function () {
            $("#mySidenav").css("left", "-400px");
            $(this).css("display", "none");
            document.body.classList.remove("openMenuActive");
        });
    }

    $(window).scroll(() => {
        if ($(this).scrollTop() > 20) {
            $(".mynavbar").addClass("fixed_navbar");
            // $("#floating").css("opacity", "1");
        } else {
            $(".mynavbar").removeClass("fixed_navbar");
            // $("#floating").css("opacity", "0");
        }
    });

    $("#floating").click(() => {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            50
        );
    });

    if ($(".customSelect").length) {
        $(".customSelect").niceSelect();
    }

    if ($("#repeater").length) {
        $("#repeater").createRepeater({
            showFirstItemToDefault: false,
        });
    }

    if ($(".submenueParent").length) {
        $(".submenueParent").click(function (e) {
            //   e.preventDefault();

            console.log($(this).children(".submenue"));
            $(this).children(".submenue").slideToggle();
        });
    }

    if ($(".main-article-slider").length) {
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav",
            infinite: false,
        });
        $(".slider-nav").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: true,
            arrows: true,
            infinite: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        dots: false,
                    },
                },
            ],
        });
    }

    if ($(".article-video").length) {
        $(".article-video-slider").slick({
            slidesToShow: 4,
            arrows: true,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    }

    if ($(".btn-complete").length) {
        $(".btn-complete").click(function () {
            $(this).closest(".team-cards").find(".ceo-card").slideToggle();
        });
    }
    if ($(".contract-slider").length) {
        $(".contract-slider").slick({
            slidesToShow: 1,
        });
    }
    
    
    
    if ($(".payment_time_meth").length) {
      $(".payment_time_meth").on('change', function () {
        let payment_value = $(this).val();
        if (payment_value == "now") {
          // payment_value
          $(this).parent().parent().next('.payment_type_parent').slideDown();
          $(this).closest(".academe_rigister").find('.payment_type_parent1').slideDown();
          $(this).closest(".academe_rigister").find('.payment_type_parent2').slideDown();
        } else if (payment_value == "later") {
          // payment_value
          $(this).parent().parent().next('.payment_type_parent').slideUp();
          $(this).closest(".academe_rigister").find('.payment_type_parent1').slideUp();
          $(this).closest(".academe_rigister").find('.payment_type_parent2').slideUp();
        }
      })
    }
    
    
    

    $("#order-type").change(function () {
        $selected_value = $("#order-type option:selected").val();
        if ($selected_value == "3") {
            swal({
                title: "نأسف",
                text: "سيتم فتح هذا الاختيار قريبا",
                icon: "warning",
                button: "حسنا",
            });
            $("#sub").attr("disabled", true);
        } else {
            $("#sub").attr("disabled", false);
        }
    });

    function UpdateCity(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/UpdateCity/" + id,
            success: function (data) {
                if (data.Status == "1") {
                    $(".Options").html(data.Options);
                }
            },
        });
    }

    function UpdatePrice(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/UpdatePrice/" + id,
            success: function (data) {
                if (data.Status == "1") {
                    $("#price").text(data.Price);
                    $("#price0").val(data.Price);
                }
            },
        });
    }

    function UpdatePricePackage(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/UpdatePricePackage/" + id,
            success: function (data) {
                if (data.Status == "1") {
                    $("#pricenum").text(data.Price);
                    $("#priceinput").val(data.Price);
                    $("#oldprice").text(data.OldPrice);
                }
            },
        });
    }

    function UpdatePriceCourse(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/course-price/" + id,
            success: function (data) {
                if (data.Status == "1") {
                    $("#pricenum").text(data.Price);
                    $("#priceinput").val(data.Price);
                    $("#oldprice").text(data.OldPrice);
                }
            },
        });
    }

    $(".order-type-package").on("change", function () {
        var id = $(".order-type-package option:selected").val();
        UpdatePricePackage(id);
    });

    $(".course_select").on("change", function () {
        var id = $(".course_select option:selected").val();
        UpdatePriceCourse(id);
    });


    $(".select0").on("change", function () {
        var id = $(".select0 option:selected").val();
        UpdateCity(id);
    });
    $(".select1").on("change", function () {
        var id = $(".select1 option:selected").val();
        UpdatePrice(id);
    });

    $("#sex_type").change(function () {
        $selected_value = $("#sex_type option:selected").val();
        if ($selected_value == "0") {
            $("#militry-service").show();
            $("#civil-service").hide();
        } else {
            $("#militry-service").hide();
            $("#civil-service").show();
        }
    });

    $(".payment-preview").change(function () {
        var val = $(".payment-preview option:selected").val();
        if (val == "0") {
            $(".phone-preview").show(700);
            $(".phone-preview input").attr("required", true);
        } else {
            $(".phone-preview").hide(700);
            $(".phone-preview input").attr("required", false);
        }
    });
    $(".num-preview-package").change(function () {
        var val = $(".num-preview-package option:selected").val();
        if (val == "0") {
            $(".phone-preview-package").show(700);
            $(".phone-preview-package input").attr("required", true);
        } else {
            $(".phone-preview-package").hide(700);
            $(".phone-preview-package input").attr("required", false);
        }
    });
    
    
     $(".num-preview-course").change(function () {
        var val = $(".num-preview-course option:selected").attr("data-attr");
        if (val == "0") {
            $(".phone-preview-course").show(700);
            $(".phone-preview-course input").attr("required", true);
        } else {
            $(".phone-preview-course").hide(700);
            $(".phone-preview-course input").attr("required", false);
        }
    });

    $("input[name=number_of_batches]").hide();
    $("#number_of_batches_label").hide();

    $("input[name=total_price_with_interest]").hide();
    $("#total_price_with_interest_label").hide();

    for (var n = 1; n <= 6; ++n) {
        $(`#batch_value${n}`).show();
        $(`#batch_value${n}_label`).show();
    }

    $('select[name="contract_type"]').change(function () {
        $selected_value = $(this).val();
        if ($selected_value == "0") {
            // Cash
            $("input[name=number_of_batches]").hide();
            $("#number_of_batches_label").hide();

            $("input[name=total_price_with_interest]").hide();
            $("#total_price_with_interest_label").hide();

            for (var n = 1; n <= 6; ++n) {
                $(`#batch_value${n}`).show();
                $(`#batch_value${n}_label`).show();
            }
        } else {
            // Installments
            $("input[name=number_of_batches]").show();
            $("#number_of_batches_label").show();

            $("input[name=total_price_with_interest]").show();
            $("#total_price_with_interest_label").show();

            for (var n = 1; n <= 6; ++n) {
                $(`#batch_value${n}`).hide();
                $(`#batch_value${n}_label`).hide();
            }
        }
    });

    const splash = document.querySelector(".spalch_parent");

    window.addEventListener("load", (e) => {
        setTimeout(() => {
            $(splash).fadeOut();
            // splash.classList.add("splashdisplayNone");
        }, 1000);
    });

    callAjaxFileForForm("check_certificate");
    function callAjaxFileForForm(filename) {
        $("#" + filename).submit(function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/eeta-check-certificate-graduate",
                data: $(this).serialize(),
                success: function (data) {
                    if (data.Status == "1") {
                        //  toastr.success(data.Message);
                        document.getElementById("wrong_id").style.display =
                            "none";
                        document.getElementById("DivIdToPrint").style.display =
                            "block";
                        $(".modal-body #DivIdToPrint").html(data.Cart_Model);
                        $("#checkCertificateModal").modal("show");
                        $("#" + filename)[0].reset();
                    }
                    if (data.Status == "0") {
                        // toastr.error(data.Message);
                        document.getElementById("DivIdToPrint").style.display =
                            "none";
                        document.getElementById("wrong_id").style.display =
                            "block";
                        $("#checkCertificateModal").modal("show");
                    }
                    if (data.Status == "2") {
                        // toastr.info(data.Message);
                    }
                },
            });
            return false;
        });
    }

    //  $('html').niceScroll();
});

function openNav() {
    document.getElementById("mySidenav").style.right = "0";
    document.getElementById("mySidenav").style.left = "0";
    document.querySelector(".bg-sidenavOpen").style.display = "block";
    document.body.classList.add("openMenuActive");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.right = "-400px";
    document.getElementById("mySidenav").style.left = "-400px";
    document.querySelector(".bg-sidenavOpen").style.display = "none";
    document.body.classList.remove("openMenuActive");
}

// $(document).contextmenu(function() {
//     return false;
// });

// document.onkeydown = function(e) {
//     if(event.keyCode == 123) {
//         return false;
//     }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//         return false;
//     }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//         return false;
//     }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//         return false;
//     }
//     if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//         return false;
//     }
// }
