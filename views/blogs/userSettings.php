<div class="page-header header-filter" data-parallax="true" style="background-image: url('/public/assets/img/city-profile.jpg');"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              <img src="/public/assets/img/faces/identicon.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
            </div>
            <div class="name">
              <h3 class="title">
                <?=$loggedUser['username']?>
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ml-auto mr-auto">
          <form class="form" method="post" action="" onsubmit="return validate();" name="edit" id="edit">
            <div class="form-group">
              <label for="name" class="bmd-label-floating">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?=$loggedUser['name']?>">
            </div>
            <div class="form-group">
              <label for="email" class="bmd-label-floating">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=$loggedUser['email']?>">
            </div>
            <div class="form-group">
              <label for="about" class="bmd-label-floating">About</label>
              <textarea form="edit" class="form-control" name="about" id="about" rows="5"><?=$loggedUser['about']?></textarea>
            </div>
            <div class="text-center">
              <a href="/blogs/profile/<?=$loggedUser['username']?>">
                <button type="button" class="btn btn-default">Cancel</button></a>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function validate() {
    if (document.forms["edit"]["name"].value == "" ||
      document.forms["edit"]["email"].value == "" ||
      document.forms["edit"]["about"].value == "") {
      alert('Please enter Please fill out all fields.');
      return false;
    }
    else if (!validateEmail(document.forms["edit"]["email"].value)) {
      alert('Please enter a valid email.');
      return false;
    }
    else {
      document.edit.submit();
      return true;
    }
  }

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
</script>