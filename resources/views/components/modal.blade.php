
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">delete post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this post?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">no</button>
          <button type="button" class="btn btn-danger">yes</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="title" class="col-form-label">Title</label>
              <input type="text" class="form-control" id="title" value="">
            </div>
            <div class="mb-3">
              <label for="description" class="col-form-label">Description</label>
              <textarea class="form-control" id="description"></textarea>
            </div>

          <div class="mb-3">
            <label for="username" class="col-form-label">username</label>
            <input type="text" class="form-control" id="username" value="">
          </div>


          <div class="mb-3">
            <label for="email" class="col-form-label">email</label>
            <input type="text" class="form-control" id="email" value="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
    <script src="js/main.js"></script>
