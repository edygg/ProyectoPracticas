
<!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">404 Error</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Pages</a></li>
                <li class="active">404 Error</li>
            </ul>
        </div> 
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">		
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v1">
                    <span class="error-v1-title"><?php echo $code; ?> </span>
                    <span>Esto es un error! xD</span>
                    <p> <?php echo CHtml::encode($message); ?> </p>
                    <!-- <p>The requested URL was not found on this server. That’s all we know.</p> -->
                     <?php echo CHtml::link('Volver',Yii::app()->request->urlReferrer,array('class'=>'btn-u btn-bordered')); ?>
                    <!-- <a class="btn-u btn-bordered" href="index.html">Atrás</a> -->
                </div>
            </div>
        </div>
        <!--End Error Block-->
    </div>	
    <!--=== End Content Part ===-->