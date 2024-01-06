<script>
    const modalCreate = document?.querySelector('#create-form');
    const modalUpdate = document?.querySelector('#edit-form');
    const activateBtnModal = document?.querySelector('.showModal');

    activateBtnModal?.addEventListener('click', function () {
        modalCreate.classList.remove('hidden');
    });

    function updateSupport(id) {
        $.ajax({
            url: '/findSupport/' + id,
            type: 'GET',
            success: function (support) {
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

        $.get('/me').done(function(data){
            authenticateAndEditSupport(
                {
                    email: data.User_logged.email,
                    password: data.Authentication,
                    device_name: 'application'
                }
            );
            function authenticateAndEditSupport(user) {
                $.ajax({
                    url: 'api/v1/auth',
                    type: "POST",
                    data: {
                        email: user.email,
                        password: user.password,
                        device_name: 'modal'
                    },
                    success: function (response) {
                        $.ajax({
                            url: 'api/v1/supports/' + id,
                            type: "PUT",
                            data: {
                                subject: subject,
                                content_body: content_body
                            },
                            headers: {
                                'Authorization': 'Bearer ' + response.token
                            },
                            success: function (response) {
                                console.log(response);
                                modalUpdate.classList.add('hidden');
                                location.href = '/supports';
                            }
                        });
                    }
                });
            }
        });
    });


</script>
