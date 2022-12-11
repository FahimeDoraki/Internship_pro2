
<?php $this->include("Layouts.header"); ?>


<div class="container my-5">
<?php if(isset($_SESSION['error'])){ 
    echo '<div class="alert alert-danger my-3 mx-auto" role="alert">'.$_SESSION['error'].'</div>';
 } ?>

<form action="<?php $this->url('article/store'); ?>" method="post" class="mx-auto shadow"  enctype="multipart/form-data">

    <section class="form-group mb-4">
        <label for="title" class="pb-2">عنوان:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان پست ...">
    </section>


    <section class="form-group mb-4">
        <label for="text" class="pb-2">متن:</label>
        <textarea class="form-control" id="text" name="text" rows="5" placeholder="متن پست ..."></textarea>
    </section>

    <section class="form-group mb-4">
        <label for="image" class="form-label">تصویر پست:</label>
        <input class="form-control" id="image" name="image" type="file">
    </section>


    <button type="submit" class="btn w-100" name="submit">ثبت</button>
</form>
    
</div>

<?php $this->include("layouts.footer"); ?>