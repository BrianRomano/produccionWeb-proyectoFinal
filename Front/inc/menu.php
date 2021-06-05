<div class="col-lg-4 col-md-4 mx-auto">
        <div class="post-preview"> 
            <h2 class="post-title">
              Categories
            </h2>
        </div>
        <hr>
        <?php
            include_once('../LogicaNegocio/CategoryBusiness.php');
            $CatB = new CategoryBusiness($con);
            foreach($CatB->getCategories() as $cat){ ?>
                <div class="post-preview">
                  <a href="index.php?tag=<?php echo (isset($_GET['tag'])?$_GET['tag']:'');?>&cat=<?php echo $cat->getId() ?>&autor=<?php echo  isset($_GET['autor'])?$_GET['autor']:'' ?>"> 
                    <h4 class="post-subtitle">
                    <?php echo $cat->getNombre() ?>
                    </h4>
                  </a>           
                </div>
            <?php } 
           /* $sql = "SELECT id,fechaCreacion,fechaModificacion,nombre,padre FROM categories";
            $resultado = $con->query($sql) ;
            foreach($resultado as $cat){ ?>
                <div class="post-preview">
                  <a href="index.php?cat=<?php echo $cat['id'] ?>&autor=<?php echo  isset($_GET['autor'])?$_GET['autor']:'' ?>"> 
                    <h4 class="post-subtitle">
                    <?php echo $cat['nombre']?>
                    </h4>
                  </a>           
                </div>
            <?php } */?>
            <div class="post-preview">
                  <a href="index.php?tag=<?php echo (isset($_GET['tag'])?$_GET['tag']:'');?>&cat=&autor=<?php echo  isset($_GET['autor'])?$_GET['autor']:'' ?>"> 
                    <h4 class="post-subtitle"> Todas  </h4>
                  </a>           
                </div> 
        <hr>
        <div class="post-preview"> 
            <h2 class="post-title">
              Autores
            </h2>
        </div>
        <hr>
        <?php
            include_once('../LogicaNegocio/UserBusiness.php');
            $CatB = new UserBusiness($con);
            foreach($CatB->getUsers() as $usuario){ ?>
                <div class="post-preview">
                  <a href="index.php?tag=<?php echo (isset($_GET['tag'])?$_GET['tag']:'');?>&cat=<?php echo  isset($_GET['cat'])?$_GET['cat']:'' ?>&autor=<?php echo $usuario->getId() ?>"> 
                    <h4 class="post-subtitle">
                    <?php echo $usuario->getNombre() ?>
                    </h4>
                  </a>           
                </div>
            <?php } ?>
            <div class="post-preview">
            <a href="index.php?tag=<?php echo (isset($_GET['tag'])?$_GET['tag']:'');?>&cat=<?php echo  isset($_GET['cat'])?$_GET['cat']:'' ?>&autor=">
                 <h4 class="post-subtitle"> Todos  </h4>
                  </a>           
                </div> 
        <hr>
        <div class="post-preview"> 
        
            <h2 class="post-title">
              Tags
            </h2>
        </div>
        <hr>
        <div class="post-preview">
        <?php
            include_once('../LogicaNegocio/TagBusiness.php');
            $TagB = new TagBusiness($con);
            foreach($TagB->getAll() as $tag){ ?>
                <a href="index.php?tag=<?php echo $tag->getId();?>&cat=<?php echo  isset($_GET['cat'])?$_GET['cat']:'' ?>&autor=<?php echo  isset($_GET['autor'])?$_GET['autor']:'' ?>">  
                    <?php echo  $tag->getNombre().' - '; ?>
                </a>           
            <?php } ?>
            <a href="index.php?tag=&cat=<?php echo  isset($_GET['cat'])?$_GET['cat']:'' ?>&autor=<?php echo  isset($_GET['autor'])?$_GET['autor']:'' ?>">  
                    Todas
                </a>  
        </div> 
      </div>