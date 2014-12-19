<!-- Main content -->
<div class="container" style="margin-bottom: 150px">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
                <article>
                        <h2><?php echo e($article->title); ?></h2>
                        <p class="pubdate"><?php echo e($article->pubdate); ?></p>
                        <?php echo $article->body; ?> 
                </article>
        </div>

        
    </div>
</div>