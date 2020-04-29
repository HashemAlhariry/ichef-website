<div class="page-header header-filter" data-parallax="true" style="background-image: url('/public/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>
            <?=$post['title']?>
          </h1>
          <h4 class="title text-center">By <a href="/blogs/profile/<?=$post['username']?>" style="color: white;">
              <?=$post['name']?></a></h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-left col-md-10 ml-auto mr-auto">
      <p>
        <?=nl2br($post['content'])?>
      </p>
      <?php if(isset($_SESSION['id'])): ?>
      <?php if($post['userId'] == $_SESSION['id']): ?>
      <div class="text-center">
        <a href="" class="openPopup">
          <button type="button" class="btn btn-danger">Delete</button>
        </a>
        <a href="/blogs/editPost/<?=$post['postId']?>">
          <button type="button" class="btn btn-primary">Edit</button>
        </a>
      </div>
      <?php endif ?>
      <?php endif ?>
    </div>
  </div>
</div>

<?php if(isset($_SESSION['id'])): ?>
<?php if($post['userId'] == $_SESSION['id']): ?>
<script>
  $('.openPopup').click(function (event) {
    event.preventDefault();
    var id = '<?=$post['postId']?>';
    $("#delete").modal("show");
    $('.delete-link').attr('href', '/blogs/delete/' + id);
  });

</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="delete-link" href="/blogs/delete/"><button type="submit" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<?php endif ?>