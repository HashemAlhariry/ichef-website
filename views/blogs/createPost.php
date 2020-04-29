<div class="page-header header-filter" data-parallax="true" style="background-image: url('/public/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Creating New Post</h1>
          <h3 class="title text-center"><a href="#create"><i class="material-icons" style="color:white;">arrow_downward</i></a>
          </h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <div class="col-md-8 ml-auto mr-auto">
        <form class="form" method="post" action="" onsubmit="return validate();" name="create" id="create">
          <div class="form-group">
            <label for="title" class="bmd-label-floating">Post Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="content" class="bmd-label-floating">Post Content</label>
            <textarea form="create" class="form-control" name="content" id="content" rows="10"></textarea>
          </div>
          <div class="text-right">
            <a href="/blogs/profile/<?=$loggedUser['username']?>">
              <button type="button" class="btn btn-default">Cancel</button></a>
            <button type="submit" class="btn btn-primary">Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function validate() {
    if (document.forms["create"]["title"].value == "" || document.forms["create"]["content"].value == "") {
      alert('Please enter both title and content.');
      return false;
    }
    else {
      document.create.submit();
      return true;
    }
  }
</script>