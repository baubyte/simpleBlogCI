<section class="s-featured">
    <div class="row">
        <div class="col-full">
            <form action="" method="post" enctype="multipart/form-data">
                <input placeholder="Titulo del Post" type="text" name="title" id="title">
                <input placeholder="Introducción del Post" type="text" name="intro" id="intro">
                <textarea placeholder="Contenido del Post" name="content" id="summernote"></textarea>
                <select name="category" id="category">
                    <?php
                    foreach ($categories as $category) {
                        echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                    }
                    ?>

                </select>
                <input placeholder="Tags para el Post" type="text" name="tags" id="tags">
                <input type="file" name="banner" id="banner" required>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>