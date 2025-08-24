document.querySelectorAll('.swal-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            let action = this.dataset.action; // Accept/Reject/Complete
            let href = this.dataset.href; // original link

            Swal.fire({
                title: 'Are you sure?',
                text: `Do you really want to mark this appointment as ${action} ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${action} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href; // redirect if confirmed
                }
            });
        });
    });


    // Hide error and success messages automatically after 2 seconds
  setTimeout(() => {
    const error = document.getElementById("errorMsg");
    const success = document.getElementById("successMsg");
    if (error) error.style.display = "none";
    if (success) success.style.display = "none";
  }, 2000);


   $('#edit-icon').click(function(){
        $('#lawyerImage').click(); // file input open
    });

    $('#lawyerImage').change(function(e){
        if(this.files && this.files[0]){
            let reader = new FileReader();
            reader.onload = function(ev){
                $('#image-preview').attr('src', ev.target.result); // preview update
            }
            reader.readAsDataURL(this.files[0]);
        }
    });