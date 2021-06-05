<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include('inc/header.php')
?>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 mx-auto">
      <?php
        $PostB = new PostBusiness($con);
        foreach($PostB->getEntradas($_GET) as $post){
          ?>
            <div class="post-preview">
              <a href="post.php?id=<?php echo $post->getId() ?>">
                <h2 class="post-title">
                  <?php echo $post->getTitulo(); ?>
                </h2>
                </a> 
                <p>                
                <?php echo $post->getEntrada(); ?>
        </p>
              
              <p class="post-meta">Posted by
                <a href="index.php?autor=<?php echo $post->getAutor()->getId(); ?>&cat=<?php echo  isset($_GET['cat'])?$_GET['cat']:'' ?>">
                  <?php echo $post->getAutor()->getNombre(); ?> 
                </a>
                <?php echo $post->getFechaCreacion(); ?> </p>
            </div>
            <hr>
      <?php } ?>
       
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
      <?php include('inc/menu.php'); ?>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
