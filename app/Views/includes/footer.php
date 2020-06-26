  <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                <?php 
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT * FROM posts WHERE show_home=1");
                        $posts = $query->getResult();
                        foreach ($posts as $post) {
                    ?>
                    <article class="col-block popular__post">
                        <a href="<?php echo base_url()?>/dashboard/post/<?php echo $post->slug.'/'.$post->id?>" class="popular__thumb">
                            <img src="<?php echo base_url();?>/uploads/<?php echo $post->banner ?>" alt="">
                        </a>
                        <h5><?php echo $post->title?></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"></a></span>
                            <span class="popular__date"><span>on</span> <time datetime="<?php echo $post->created_at ?>"><?php echo date('d-m-Y',strtotime($post->created_at)) ?></time></span>
                        </section>
                    </article>
                    <?php
                        }
                    ?>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
        
                        <ul class="linklist">
                        <?php
                            $db = \Config\Database::connect();
                            $query = $db->query("SELECT * FROM categories");
                            $categories = $query->getResult();
                            foreach ($categories as $category) {
                            echo '<li><a href="'. base_url().'/dashboard/category/'.$category->id.'">'.$category->name.'</a></li>'  ;
                        }
                    ?>
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
        
                        <ul class="linklist">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="<?php echo base_url() ?>/dashboard/blog">Blog</a></li>
                            <li><a href="#0">About</a></li>
                            <li><a href="#0">Contact</a></li>
                            <li><a href="#0">Privacy Policy</a></li>
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-six tab-full s-footer__about">
                        
                    <h4>About Wordsmith</h4>

                    <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at. 
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error 
                    temporibus magnam est voluptatem.</p>

                </div> <!-- end s-footer__about -->

                <div class="col-six tab-full s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="email" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <div class="btn" name="subscribe" id="addNewsletter">Enviar</div>
                
                            <label for="mc-email" class="subscribe-message" id="resultNewsletter"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                <div class="col-six">
                    <ul class="footer-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                </div>
                
            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->
    <?php
        if ($view !="uploadPost") {
    ?>
            <!-- Java Script
            ================================================== -->
            <script src="<?php echo base_url();?>/assets/js/jquery-3.2.1.min.js"></script>
            <script src="<?php echo base_url();?>/assets/js/plugins.js"></script>
            <script src="<?php echo base_url();?>/assets/js/main.js"></script>
                
            <!-- include libraries(jQuery, bootstrap) -->
            <!--<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->
            <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
            <!-- include summernote css/js -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <?php
        }
    ?>
    <script type="text/javascript">
        $("#addNewsletter").click(function(){
            var inputEmail = $("#mc-email").val();
            $.post("<?php echo base_url()?>/dashboard/addNewsletter",{email:inputEmail}).done(function(data){
               console.log(data);
               $("#resultNewsletter").html(data);
            });
        })
    </script>
</body>

</html>