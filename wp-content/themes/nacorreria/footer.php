
     <section class="footer">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <img src="<?php echo bloginfo('template_url');?>/assets/images/footer_logo.png" class="footer-left"/>
            <div class="footer-left">
                NEWSLETTER
                <p>Fique por dentro de<br/>
todas as novidades do blog.</p>
            </div>
            <div class="footer-left">
                <div class="input-group" style="margin-top: 30px; width: 250px;">
                    <input type="text" class="  search-query form-control" placeholder="E-mail..." />
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 redes-sociais">
            <div style="max-width: 125px;float: right;">
            <p style="text-align: left;">Conecte-se:</p>
            <ul class="list-inline">
                <li><a href="https://www.facebook.com/ticketagora/" target="_blank"><img src="<?php echo bloginfo('template_url');?>/assets/images/facebook.png" /></a></li>
                <li><a href="https://www.instagram.com/ticketagora/" target="_blank"><img src="<?php echo bloginfo('template_url');?>/assets/images/instagram.png" /></a></li>
                <li><a href="https://www.linkedin.com/company-beta/10229248/" target="_blank"><img src="<?php echo bloginfo('template_url');?>/assets/images/linkedin.png" /></a></li>
            </ul>    
            </div>
            
        </div>
    </div>
</section>


<section class="footer-autoria">
    <div class="container">
        <p class="text-center">© 2017 Ticket Agora - Todos os direitos reservados.</p>
    </div>    
</section>
    <?php wp_footer(); ?>

    <!-- Swiper JS -->
    <script src="<?php echo bloginfo('template_url');?>/assets/js/swiper.js"></script>
    <script src="<?php echo bloginfo('template_url');?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo bloginfo('template_url');?>/assets/js/bootstrap.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        paginationType: 'progress',                      
        autoplay: 3500,
        autoplayDisableOnInteraction: false,
        loop: true,
        speed: 2000,
    });
    
    
$(function(){
  $.fn.coverImage = function(contain) {
    this.each(function() {
      var $this = $(this),
        src = $this.get(0).src,
        $wrapper = $this.parent();

      if (contain) {
        $wrapper.css({
          'background': 'url(' + src + ') 50% 50%/contain no-repeat'
        });
      } else {
        $wrapper.css({
          'background': 'url(' + src + ') 50% 50%/cover no-repeat'
        });
      }

      $this.remove();
    });

    return this;
  };
    $('.cover-image').coverImage();
});

    </script>
</body>
</html>