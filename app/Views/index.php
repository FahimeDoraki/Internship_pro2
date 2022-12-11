
<?php $this->include("Layouts.header"); ?>

<div class="sec1 my-5 row align-items-center">
    <div class="col">
        <div class="baner_txt d-flex flex-column mx-auto">
        <h2>برای ایجاد پست جدید کلیک کنید</h2>
        <a href="<?php $this->url('article/create'); ?>">پست جدید</a>
        </div>
    </div>
    <div class="col">
        <img src="<?php $this->asset('Images/t.png'); ?>" alt="img">
    </div>
</div>



<div class="sec2 container row mx-auto mb-5">
    <?php foreach ($articles as $article) {?>
        <div class="col-4 d-flex justify-content-center align-items-center p-4">
            <div class="card">
                <img src="<?php $this->asset("/Images//".$article['image']); ?>" class="card-img-top" alt="img">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $article['title'] ?></h5>
                    <p class="card-text"><?php echo $article['text'] ?></p>
                    <a href="<?php $this->url('article/show/'.$article['id']); ?>" class="btn">مشاهده پست</a>
                </div>
            </div>
        </div>
    <?php } ?>



</div>

<?php $this->include("layouts.footer"); ?>
