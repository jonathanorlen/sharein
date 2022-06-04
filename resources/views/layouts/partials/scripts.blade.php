{{-- <script src="{{ mix('js/app.js') }}" defer data-turbolinks-track="reload"></script> --}}
{{-- <script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="reload"></script> --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

<script>
    window.addEventListener('refreshIframe', event => {
        document.getElementById('frame').contentDocument.location.reload(true);
    });
    //  feather.replace()

    window.addEventListener('toast', event => {
        console.log("10");
        toast(event.detail.header, event.detail.message, event.detail.status);
    })

    function toast($header = null, $message = null, $status = null) {
        if ($status == 'danger') {
            var toastLiveExample = document.getElementById('dangerToast')
            document.getElementById("dangerBody").innerHTML = $message;
            document.getElementById("dangerHeader").innerHTML = $header;
        } else if ($status == 'warning') {
            var toastLiveExample = document.getElementById('warningToast')
            document.getElementById("warningBody").innerHTML = $message;
            document.getElementById("warningHeader").innerHTML = $header;
        } else {
            var toastLiveExample = document.getElementById('successToast')
            document.getElementById("successBody").innerHTML = $message;
            document.getElementById("successHeader").innerHTML = $header;
        }
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }

    // const button = document.querySelector('#share-button');
    // button.addEventListener('click', () => {
    //     const URL = window.location.href.slice(7);

    //     navigator.clipboard.writeText(URL);
    // });
</script>
