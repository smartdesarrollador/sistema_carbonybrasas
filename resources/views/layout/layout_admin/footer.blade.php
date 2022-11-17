<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown({
            constrainWidth: false,
            coverTrigger: false
        });
    });

    $(document).ready(function() {
        $('select').formSelect();
    });
</script>
<script type="text/javascript" src="{{ asset('admin_assets/library/js/materialize.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/library/js/sweetalert2.min.js') }}"></script>
<script>
    Notification.requestPermission().then(function(result) {});

    function NotificationAPI() {

        var options = {
            body: "Tienes un nuevo pedido",
            icon: "{{ asset('admin_assets/img/logoMain.png') }}",
        };

        var n = new Notification('Richards', options);
        setTimeout(n.close.bind(n), 5000);
        n.onclick = function() {
            window.open('https://operaciones.carbonybrasas.pe/dashboard');
        };

    }


    var sound = document.getElementById("myAudio");

    function playAudio() {
        sound.play();
    }

    function pauseAudio() {
        sound.pause();
    }

    function refreshPedidos() {
        $.ajax({
            url: "{{ route('admin.ajax.update_pedidos') }}",
            success: function(data) {
                if (data == actualPedidos) {
                    console.log("Ejecutandose");
                } else {

                    Swal.fire({
                        title: 'NUEVO PEDIDO!',
                        text: 'Tienes un Nuevo Pedido',
                        imageUrl: "{{ asset('admin_assets/img/notificacion.jpg') }}",
                        imageWidth: 400,
                        imageAlt: 'Custom image',
                        onAfterClose: redirigir
                    });

                    playAudio();
                    actualPedidos = data;
                    NotificationAPI();


                }
            }
        });
    }

    function redirigir() {
        location.reload();
    }

    let actualPedidos;
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('admin.ajax.update_pedidos') }}",
            success: function(data) {

                actualPedidos = data;
                console.log(actualPedidos);
            },
            complete: function() {
                var interval = setInterval('refreshPedidos()', 5000);

            }
        });





    });
</script>
