<!-- Create form -->
<div class="container" style="width:40%;">
    <div class="card card-info mt-5" style="z-index: 999;">
        <div class="card-header bg-info">
            <h3 class="card-title">Create New Article</h3>
        </div>
        <form action="/articles" method="post" id="validate_article_form" data-form-type="create"
            enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-pencil-alt'></i></span>
                        </div>
                        <input type="text" id="article_title" name="article_title" class="form-control vaildate_input"
                            placeholder="Article Title" required>
                        <div class="alert alert-danger px-3 py-2 mt-2 d-none w-100" role="alert"
                            data-mdb-color="warning" id="name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Title Only letters and characters between 3 and 20
                        </div>
                    </div>
                </div>

                <div class="form-group col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-pencil-alt'></i></span>
                        </div>
                        <input type="text" id="article_summary" name="article_summary"
                            class="form-control vaildate_input" placeholder="Article Summary" required>
                        <div class="alert alert-danger px-3 py-2 mt-2 d-none w-100" role="alert"
                            data-mdb-color="warning" id="name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Summary contain characters between 3 and 50
                        </div>
                    </div>
                </div>

                <div class="form-group col-12">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <textarea class="form-control custom-textarea vaildate_input" id="article_content"
                            name="article_content" placeholder="Article Content" required rows="3"
                            style="resize: none;"></textarea>
                        <div class="alert alert-danger px-3 py-2 mt-2 d-none w-100" role="alert"
                            data-mdb-color="warning" id="name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            Content contain characters between 3 and 5000
                        </div>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                        </div>
                        <input type="file" name="article_image" id="fileToUpload" class="form-control-file">
                        <div class="alert alert-danger px-3 py-2 mt-2 d-none w-100" role="alert"
                            data-mdb-color="warning" id="name-alert" style="font-size: 12px;">
                            <i class="bi bi-x-lg me-1"></i>
                            please enter another image
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit"
                    class="btn btn-info bg-info btn-block create-btn create">Create</button>
            </div>
        </form>
    </div>
</div>

<script src="/views/dist/js/article_validation.js"></script>