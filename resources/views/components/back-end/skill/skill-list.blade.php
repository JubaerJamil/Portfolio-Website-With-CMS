<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between">
                    <div class="align-items-center col">
                        <h6 class="fs-3">Skill List</h6>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#Skill-create-modal"
                            class="float-end btn m-0 btn-sm bg-gradient-success">Create</button>
                    </div>
                </div>
                <hr class="bg-secondary" />
                <div class="table-responsive">
                    <table class="table" id="tableData">
                        <thead>
                            <tr class="bg-info">
                                <th>No</th>
                                <th>Skill Name</th>
                                <th>Skill Percentage</th>
                                <th>Skill Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    getSkillList();
    async function getSkillList() {

        showLoader();
        let res = await axios.get('/skill-list');
        hideLoader();

        let tableList = $('#tableList');
        let tableData = $('#tableData');

        tableData.DataTable().destroy();
        tableList.empty();


        res.data.forEach(function(item, index) {

            let row = `
        <tr>
            <td class="">${ index +1 }</td>
            <td>${ item['skill_name'] }</td>
            <td>${ item['show_percentage'] }</td>
            <td>${ item['skill_percentage'] }</td>
            <td>
                <button data-id ="${item['id']}" class= "Editbtn btn btn-outline-success text-sm px-3 py-1  m-0">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                <button data-id ="${item['id']}" class= "Deletebtn btn btn-outline-danger text-sm px-3 py-1 m-0">
                    <i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
        </tr>`
            tableList.append(row)
        });

        $('.Editbtn').on('click', async function() {
            let id = $(this).data('id');
            await fillUpSkill(id);
            $('#skill-update-modal').modal('show');
            $('#skillItemId').val(id);
        });

        $('.Deletebtn').on('click', function() {
            let id = $(this).data('id');
            $('#skill-delete-modal').modal('show');
            $('#deleteID').val(id);
        });

        new DataTable('#tableData', {
            order: [
                [0, 'desc']
            ],
            lengthMenu: [10, 25, 50, 100]
        });

    }
</script>
