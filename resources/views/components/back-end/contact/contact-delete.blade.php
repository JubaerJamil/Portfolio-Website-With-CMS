<div class="modal" tabindex="-1" id="msg-delete-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title fs-1 text-danger">Delete!</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <p class="fs-4 text-center text-primary">Are you sure, want to delete this message?</p>
          <input class="text-center d-none ms-6" id="deleteID">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalclose">Cancel</button>
          <button onclick="msgDelete()" type="button" class="btn btn-danger" id="deleteIt">Delete</button>
        </div>
      </div>
    </div>
  </div>

<script>

    async function msgDelete(){

        let id = document.getElementById('deleteID').value;
                document.getElementById('modalclose').click();

        showLoader();
            let res = await axios.post('/message-delete', {id:id});
        hideLoader();

        if(res.status === 200 && res.data['status'] === 'success')
        {
            successToast('Delete Successfully Done');
            await getMessageList();
        }
        else
        {
            errorToast('Request Failed');
        }
    }



</script>
