<!--===============================================================================================-->

{!! Html::script('/advent/vendor/jquery/jquery-3.2.1.min.js') !!}
<!--===============================================================================================-->

{!! Html::script('/advent/vendor/animsition/js/animsition.min.js') !!}
<!--===============================================================================================-->

{!! Html::script('/advent/vendor/bootstrap/js/popper.js') !!}

{!! Html::script('/advent/vendor/bootstrap/js/bootstrap.min.js') !!}
<!--===============================================================================================-->

{!! Html::script('advent/vendor/select2/select2.min.js') !!}
<script>
    $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
</script>

<!--===============================================================================================-->

{!! Html::script('advent/vendor/daterangepicker/moment.min.js') !!}

{!! Html::script('advent/vendor/daterangepicker/daterangepicker.js') !!}
<!--===============================================================================================-->

{!! Html::script('advent/vendor/slick/slick.min.js') !!}

{!! Html::script('advent/js/slick-custom.js') !!}
<!--===============================================================================================-->

{!! Html::script('advent/vendor/parallax100/parallax100.js') !!}
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->

{!! Html::script('advent/vendor/MagnificPopup/jquery.magnific-popup.min.js') !!}
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
</script>
<!--===============================================================================================-->

{!! Html::script('advent/vendor/isotope/isotope.pkgd.min.js') !!}
<!--===============================================================================================-->
<!--===============================================================================================-->

{!! Html::script('advent/vendor/perfect-scrollbar/perfect-scrollbar.min.js') !!}
<script>
    $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){ ps.update(); });
        });
</script>
<!--===============================================================================================-->

{!! Html::script('advent/js/main.js') !!}
{!! Html::script('/StreamLab/StreamLab.js') !!}
{!! Html::script('/advent/js/advent.js') !!}

<script>
    function myFunction(dropdown) { document.getElementById(dropdown).classList.toggle("show"); }

    function filterFunction(inputname, dropdown) {
        var input, filter, ul, li, a, i;
        input = document.getElementById(inputname);
        filter = input.value.toUpperCase();
        div = document.getElementById(dropdown);
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) ? a[i].style.display = "" : a[i].style.display = "none";
        }
    }
</script>