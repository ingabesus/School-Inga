<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create PROJECT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="ajaxForm">
            <div class="form-group">
                <label for="project_title">Project TITLE</label>
                {{-- is-invalid ant inputo --}}
                <input id="project_title" class="form-control create-input" type="text" name="project_title" />
                
                <span class="invalid-feedback input_project_title">
                </span>
              </div>
            <div class="form-group">
                <label for="project_groups_number">Groups</label>
                <input id="project_groups_number" class="form-control create-input" type="number" name="project_groups_number" />
                <span class="invalid-feedback input_client_surname">
                </span>
            </div>
            <div class="form-group">
                <label for="project_students_number">Students</label>
                <input id="project_students_number" class="form-control create-input" type="text" name="project_students_number" />
                <span class="invalid-feedback input_project_students_number">
                </span>  
            </div>
            
        </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            {{-- <button id="close-client-create-modal" type="button" class="btn btn-secondary">Close with Javascript</button> --}}
            <button id="submit-ajax-form" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

 