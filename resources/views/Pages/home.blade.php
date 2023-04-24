
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    *{
        font-family: 'Poppins', sans-serif;
    }
    .btnh {
    border: none;
    transition: 0.5s;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
}

.btnh:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    transition: box-shadow 0.3s ease-in-out;
}
.font-fh{
    font-size: 25px;
}


</style>
<livewire:home>
    @section('script')
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });

        $(document).ready(function() {
        $("#success-alert").hide();
        $("#myWish").click(function showAlert() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
            });
        });
        });

//         $(document).ready(function() {
//    $('.js-example-basic-multiple1').select2({
//        placeholder: "Select any of the following"
//    });
//    });
    </script>
    @endsection
