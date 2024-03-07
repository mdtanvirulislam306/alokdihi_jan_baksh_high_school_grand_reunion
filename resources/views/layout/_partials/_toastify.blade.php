@if(Session::has('success'))
    <script >
        Toastify({
            text: "😀 {{ Session::get('success') }}",
            className: "success",
            duration: 3000,
            closeButton:true,
            close: true,
            style: {
                background: "linear-gradient(to right, #009933 , #33cc33)",
                fontWeight:"bold"
            }
        }).showToast();
    </script>
@endif
@if(Session::has('error'))
    <script >
        Toastify({
            text: "😭 {{ Session::get('error') }}",
            className: "success",
            duration: 3000,
            closeButton:true,
            close: true,
            style: {
                background: "linear-gradient(to right, #D4145A , #FBB03B)",
                fontWeight:"bold"
            }
        }).showToast();
    </script>
@endif
@if($errors->any())
    <script >
        @foreach($errors->all() as $error)
        Toastify({
            text: "😭 {{ $error }}",
            className: "error",
            duration: 5000,
            closeButton:true,
            close: true,
            style: {
                background: "linear-gradient(to right, #D4145A , #FBB03B)",
                fontWeight:"bold"
            }
        }).showToast();
        @endforeach
    </script>
@endif
