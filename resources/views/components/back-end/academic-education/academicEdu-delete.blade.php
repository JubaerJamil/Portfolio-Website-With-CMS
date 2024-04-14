<div class="modal" tabindex="-1" id="edu-delete-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title fs-1 text-danger">Delete!</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <p class="fs-4 text-center text-primary">Are you sure, want to delete this item?</p>
          <input class="text-center d-none ms-6" id="eduDeleteID">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edumodalclose">Cancel</button>
          <button onclick="deleteEtuItem()" type="button" class="btn btn-danger" id="deleteIt">Delete</button>
        </div>
      </div>
    </div>
  </div>



  <script>

    async function deleteEtuItem(){

        let id = document.getElementById('eduDeleteID').value;
                document.getElementById('edumodalclose').click();

        showLoader();
            let res = await axios.post('/delete-education', {id:id});
        hideLoader();

        if(res.status === 200 && res.data['status']=== 'success')
        {
            successToast('Delete Successfully Done');
            await getAcademicEduList();
        }
        else
        {
            errorToast('Request Failed');
        }

    }



</script>
