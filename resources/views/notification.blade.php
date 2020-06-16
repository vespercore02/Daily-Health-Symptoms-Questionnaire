
<div class="modal" id="modal-popup">
    <div class="modal-content bg-danger">
        <span class="close" onclick="CloseModal()" >&times;</span>
        <h3 id="alert-message">
            
        </h3>
        
    </div>
</div>

<audio id="alert_audio" src="alert.mp3"
muted="muted"></audio>

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    
    Echo.channel('home')
        .listen('NewMessage', (e) => {
            console.log(e.message);
            document.getElementById('alert_audio').play();
            document.getElementById('modal-popup').style.display = 'block'
            document.getElementById('alert-message').innerHTML = e.message;
        })
     
    function CloseModal(){
        document.getElementById('modal-popup').style.display = "none";
        console.log('test');
    }

    window.onclick = function(event) {
    if (event.target == document.getElementById('modal-popup')) {
        document.getElementById('modal-popup').style.display = "none";
    }
    }

</script>
@endsection