<!-- Create form -->
<div class="container w-50">
    <div class="card card-primary" style="z-index: 999;">
        <div class="card-header">
            <h3 class="card-title">Article Create Form</h3>
        </div>
        <form action="/articles" method="post" id="" data-form-type="create" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-pencil-alt'></i></span>
                        </div>
                        <input type="text" id="article_title" name="article_title" class="form-control vaildate_input" placeholder="Article Title" required>
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-pencil-alt'></i></span>
                        </div>
                        <input type="text" id="article_summary" name="article_summary" class="form-control vaildate_input" placeholder="Article Summary" required>
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <textarea class="form-control custom-textarea vaildate_input" id="article_content" name="article_content" placeholder="Article Content" required rows="3" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                        </div>
                        <input type="file" name="article_image" id="fileToUpload" class="form-control-file">
                        
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-info btn-block create-btn create">Create</button>
            </div>
        </form>
    </div>
</div>

<script src="/views/dist/js/user_vaildation.js"></script>
<script>
    const uploadButton = document.getElementById('create');
    const imageUpload = document.getElementById('fileToUpload');

    imageUpload.addEventListener('change', () => {
        if (imageUpload.value) {
            uploadButton.style.display = 'block';
        } else {
            uploadButton.style.display = 'none';
        }
    });
</script>