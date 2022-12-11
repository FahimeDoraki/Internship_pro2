
<?php $this->include("Layouts.header"); ?>

<div class="container mx-auto d-flex flex-column align-items-center my-4 shadow p-3 pb-5">
    <div class="imgshow">
        <img src="<?php $this->asset("/Images//".$article['image']); ?>" alt="">
    </div>
    <div class="titleshow my-5 d-flex justify-content-center w-100 p-1">
        <h2 class="card-title"><?php echo $article['title'] ?></h2>
    </div>
    <div class="textshow w-75">
    <p class="card-text"><?php echo $article['text'] ?></p>
    </div>
    <div class="deleteshow mt-5">
        <a href="<?php $this->url('article/destroy/'.$article['id']); ?>" class="btn">حذف پست</a>
    </div>
</div>

<?php $this->include("layouts.footer"); ?>