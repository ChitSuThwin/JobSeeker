@if (Session::has('message'))
    <div id="msg" class="position-fixed bottom-0 me-3 mb-3 py-2 px-3 rounded {{ Session::get('message')['type'] == 'success' ? 'bg-success' : 'bg-danger' }}" style="right: 0;">
        {{ Session::get('message')['text'] }}
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('#msg').style.display = 'none';
        }, 5000);
    </script>
@endif
