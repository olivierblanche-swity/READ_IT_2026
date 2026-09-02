<?php
/**
 * @var string $id
 *  */ ?>


<div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <form action="?comments=add" class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo *</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="form-group">
            <label for="content">Message</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="post_id" value="<?php echo $id; ?>" />
            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
        </div>

    </form>
</div>