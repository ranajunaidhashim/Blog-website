<?php include("header.php") ?>
<?php include("sidebar.php") ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Posts Editor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Posts</li>
        <li class="breadcrumb-item active">Editors</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create your Post</h5>

        <!-- Quill Editor Full -->

        <span id="myspan"></span>
        <!-- <div class="row mb-3 col-lg-6 align-items-center">
          <label for="title" class=" col-lg-2 col-form-label">Title</label>
          <div class="col-md-8 col-lg-9">
            <textarea name="title" type="text" class="form-control" id="title"></textarea>
          </div>
        </div> -->
        <div class="row mb-3 col-lg-8 align-items-center">
          <label for="title" class=" col-lg-2 col-form-label">Title:</label>
          <div class="col-md-8 col-lg-9">
          <div  id="TitleEditor">  <!--added features to a default snow quill editor -->
          <p>Write Your Title Here..</p>
        </div>
          </div>
        </div>
        
        <!-- <div class="quill-editor-full" id="editor"> -->
        <div  id="editor">  <!--added features to a default snow quill editor -->
          <p>Write Post Content Here..</p>
        </div>
        <!-- End Quill Editor Full -->
        <div class="mt-4 col-lg-2">
          <button onclick="createpost()" class="btn btn-primary">Create Post</button>
        </div>
      </div>
    </div>

    </div>
    </div>
  </section>

</main><!-- End #main -->

<?php include("footer.php") ?>

<!-- <script>
  function createpost() {
    var quill = new Quill('#editor', {
    theme: 'snow'
    // Other configurations...
  });
    var t1 = document.getElementById("title").value;
    var editorContent = quill.root.innerHTML; // Get Quill editor's content

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
        if (response.trim() === "success") {
          document.getElementById("myspan").innerHTML = "Post Created successfully!";
          document.getElementById("title").value = ""; // Use single '=' to set value
          quill.root.innerHTML = ''; // Clear Quill editor's content

          // Redirect or perform other actions upon successful post creation
          // window.location.href = "index.php";
        }
      }
    };

    xmlhttp.open("GET", "./ajaxPHP/createPost.php?tt=" + t1 + "&ps=" + encodeURIComponent(editorContent), true);
    xmlhttp.send();
  }
</script> -->
<script>
 // document.addEventListener('DOMContentLoaded', function() {
    var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    [{ 'script': 'sub' }, { 'script': 'super' }],     // superscript/subscript
    [{ 'indent': '-1' }, { 'indent': '+1' }],         // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean'],                                        // remove formatting button
   ['link', 'video']
    // ['link', 'image', 'video']                        // image and video insertion
  ];

  var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: toolbarOptions
    }
  });
  var tquill = new Quill('#TitleEditor', {
    theme: 'snow',
  });

  function createpost() {
    var editorTitle = tquill.root.innerHTML; 
    var editorContent = quill.root.innerHTML; 

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
        document.getElementById("myspan").innerHTML = this.responseText;
        if (response.trim() === "success") {
          document.getElementById("myspan").innerHTML = "Post Created successfully!";
          tquill.root.innerHTML = ''; // Clear Quill editor's content
          quill.root.innerHTML = ''; // Clear Quill editor's content

          // Redirect or perform other actions upon successful post creation
          // window.location.href = "index.php";
        }
      }
    };

    xmlhttp.open("POST", "./ajaxPHP/createPost.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "tt=" + encodeURIComponent(editorTitle) + "&ps=" + encodeURIComponent(editorContent);
    xmlhttp.send(params);
  }

</script>