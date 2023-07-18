<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="memberModal">Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="memberForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="userID" class="form-label">UserID</label>
                        <input type="text" class="form-control" id="userID"  >
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="userEmail"  aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" >
                    </div>
                    <div class="mb-3">
                        <label for="rePassword" class="form-label">Password Repeat</label>
                        <input type="password" class="form-control" id="rePassword" >
                    </div>
                    <div class="mb-3">
                        <p class="membererrorMessage ">gg</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </form>
            
        </div>
    </div>
</div>