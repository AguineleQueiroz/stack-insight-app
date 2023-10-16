<script>
    const modalCreate = document.querySelector('#create-form');
    const modalUpdate = document.querySelector('#edit-form');
    const activateBtnModal = document.querySelector('.showModal');

    activateBtnModal.addEventListener('click', function () {
        modalCreate.classList.remove('hidden');
    });

    function updateSupport(id) {
        $.ajax({
            url: '/findSupport/' + id,
            type: 'GET',
            success: function (support) {
                console.log(support)
                $('#support-id').val(support.id);
                $('#subject').val(support.subject);
                $('#content_body').val(support.content_body);
                modalUpdate.classList.remove('hidden');
            }
        });
    }

    $('#form-edit').submit( function (e) {
        e.preventDefault();
        let id = $('#support-id').val();
        let subject = $('#subject').val();
        let content_body = $('#content_body').val();

        $.ajax({
            url: '/api/v1/supports/' + id,
            type: "PUT",
            data: {
                subject: subject,
                content_body: content_body
            },
            success:function (response) {
                console.log(response)
                modalUpdate.classList.add('hidden')
                location.href = '/supports'
            }
        })
    })

</script>
