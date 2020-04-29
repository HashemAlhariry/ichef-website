<div class="page-header header-filter" data-parallax="true" style="background-image: url('/public/assets/img/profile_city.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Discover New Stuff</h1>
        <h4>Here you can checkout the latest blog posts posted on our beloved platform.</h4>
        <br>
      
        <a href="/blogs/createPost" class="btn btn-primary btn-raised btn-lg">
          Create a New Post Now
        </a>
     
        <a href="/home/register" class="btn btn-primary btn-raised btn-lg">
          Register Now
        </a>
   
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section" id="posts">
      <div class="row">

            $pages = ceil($size / $limit);
            if(($page > 0 and $page <= $pages) or $page = 1) 
            {  
              for($i = 0; $i < $limit; $i++)
              {
                $index = $i + ($limit * ($page - 1));
                if($index === $size)
                {
                  break;
                }
                echo '<div class="col-lg-6 col-md-12">
                <div class="title">';
                echo '<h3><a href="/blogs/viewPost/' . $posts[$index]['postId'] . '">' . $posts[$index]['title'] . '</a>';
                if(isset($_SESSION['id']))
                {
                  if($posts[$index]['userId'] == $_SESSION['id'])
                  {
                    echo '<span style="margin-right: 10%;" class="float-right"><a href="/blogs/editPost/' . $posts[$index]['postId'] . 
                    '"><i class="material-icons">edit</i>
                    <div class="ripple-container"></div></a>
                    <a href="" class="openPopup" id="' . $posts[$index]['postId'] . '"><i class="material-icons">delete</i>
                    <div class="ripple-container"></div></a>
                    </span>';
                  }
                }
                echo '</h3><h6>By <a href="/blogs/profile/'. $posts[$index]['username'] . '">' . $posts[$index]['name'] . '</a></h6></div>';
                echo '<p>' . substr($posts[$index]['content'], 0, 300) . ((strlen($posts[$index]['content']) > 300) ?
                '... <a href="/blogs/viewPost/' . $posts[$index]['postId'] . '">Continue Reading</a>' : '') . '</p></div>';
              }
              echo '</div><br>';
              echo '<div class="row">
              <div class="col-md-6 ml-auto mr-auto text-center">
              <ul class="pagination pagination-primary" style="display: inline-flex;">';
              //if($page != 1)
              //{
                echo '<li class="page-item">
                <a href="/blogs/discover/' . (($page != 1) ? ($page - 1) : '') . '#posts" class="page-link"> prev<div class="ripple-container"></div></a>
                </li>';
              //}
              for($i = (($page - 2 >= 1) ? $page - 2 : 1); $i <= ((($page + 2) <= $pages) ? $page + 2 : $pages); $i++)
              {
                echo '<li class="' . (($i == $page) ? 'active ' : '') . 'page-item">
                <a href="/blogs/discover/' . $i . '#posts" class="page-link">' . $i . '</a>
                </li>';
              }
              //if($page != $pages and $pages > 1)
              //{
                echo '<li class="page-item">
                <a href="/blogs/discover/' . (($page != $pages and $pages > 1) ? ($page + 1) : '') . '#posts" class="page-link">next <div class="ripple-container"></div></a>
                </li>';
              //ss}
              echo '</ul>
              </div>
              </div>
              <br>';
            }
            else
            {
              header('Location: ' . WEBROOT . 'home/notFound');
            }
          ?>
      </div>
    </div>
  </div>
</div>

<script>
  $('.openPopup').click(function (event) {
    event.preventDefault();
    var test = $(this).attr('id');
    $("#delete").modal("show");
    $('.delete-link').attr('href', '/blogs/delete/' + test);
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
        <a class="delete-link" href="/blogs/delete/"><button type="submit" class="btn btn-primary">Delete</button></a>
      </div>
    </div>
  </div>
</div>