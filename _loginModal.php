<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModal">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="loginForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginUserId" class="form-label">User ID</label>
                        <input type="text" class="form-control" name="loginUserId" id="loginUserId" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginUserPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="loginUserPassword" id="loginUserPassword">
                    </div>

                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">remember</label>
                    </div> -->
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>