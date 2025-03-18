document.addEventListener('DOMContentLoaded', function () {
    const tipoSolicitud = document.getElementById('tipo_solicitud');
    const formularioSolicitud = document.getElementById('formulario_solicitud');
    const mensajeEjemplo = document.getElementById('mensaje_ejemplo');
    const productoFields = document.getElementById('producto_fields');
    const servicioFields = document.getElementById('servicio_fields');
    const proveedorFields = document.getElementById('proveedor_fields');
    const guardarBtn = document.getElementById('guardar_btn');
    const titulo = document.getElementById("titulo");
    const nombre = document.getElementById("nombre");
    const modelo = document.getElementById("modelo");
    const marca = document.getElementById("marca");
    const cantidad = document.getElementById("cantidad");
    const presupuesto = document.getElementById("presupuesto");
    const tipoServicio = document.getElementById("tipo_servicio");
    const descripcion = document.getElementById("descripcion");
    const linkDrive = document.getElementById("link_drive");
    const archivo = document.getElementById("archivo");
    const tipo_solicitudServicio = document.getElementById('tipo_solicitudServicio');
    const descripcion_servicio = document.getElementById('descripcion_servicio');
    const presupuesto_servicio = document.getElementById('presupuesto_servicio');
    const trabajo = document.getElementById('trabajo');
    const detalles = document.getElementById('detalles');
    const conocimientos = document.getElementById('conocimientos');
    const cursos = document.getElementById('cursos');
    const tiempo = document.getElementById('tiempo');
    const mensajeExito = document.getElementById("modal_exito");
    const cerrarModal = document.getElementById("cerrar_modal");




    tipoSolicitud.addEventListener('change', function () {
        // Muestra el formulario de solicitud
        formularioSolicitud.classList.remove('hidden');

        // Muestra el mensaje de ejemplo
        mensajeEjemplo.classList.remove('hidden');

        // Reinicia el estado de los campos
        resetFormulario();

        // Verifica el tipo de solicitud seleccionado
        switch (tipoSolicitud.value) {
            case 'producto':
                // Mostrar campos para producto
                servicioFields.classList.add('hidden');
                productoFields.classList.remove('hidden');
                proveedorFields.classList.add('hidden');
                break;
            case 'servicio':
                // Mostrar campos para servicio
                servicioFields.classList.remove('hidden');
                productoFields.classList.add('hidden');
                proveedorFields.classList.add('hidden');
                break;
            case 'proveedor':
                // Mostrar campos para proveedor
                proveedorFields.classList.remove('hidden');
                servicioFields.classList.add('hidden');
                productoFields.classList.add('hidden');
                break;
            default:
                // Si no se seleccionó nada, ocultar el formulario
                formularioSolicitud.classList.add('hidden');
                mensajeEjemplo.classList.add('hidden');
        }

        // Resetear campos antes de asignar valores nuevos
        titulo.value = "";
        nombre.value = "";
        modelo.value = "";
        marca.value = "";
        cantidad.value = "";
        presupuesto.value = "";
        tipoServicio.value = "";
        descripcion.value = "";
        linkDrive.value = "";
        archivo.value = "";

        if (tipoSolicitud.value === "producto") {
            titulo.value = "Solicitud de laptops";
            nombre.value = "Laptop Dell XPS";
            modelo.value = "XPS 15";
            marca.value = "Dell";
            cantidad.value = "5";
            presupuesto.value = "2500 USD";
            descripcion.value = "Laptops para desarrollo de software.";
            linkDrive.value = "https://drive.google.com/example";
            archivo.value = "📎 archivo.pdf";
        } else if (tipoSolicitud.value === "servicio") {
            // Mostrar solo los campos necesarios para servicios
            titulo.closest("div").classList.remove("hidden");
            tipoServicio.closest("div").classList.remove("hidden");
            descripcion.closest("div").classList.remove("hidden");
            presupuesto.closest("div").classList.remove("hidden");
            linkDrive.closest("div").classList.remove("hidden");
            archivo.closest("div").classList.remove("hidden");

            // Valores predeterminados para Servicio
            titulo.value = "Mantenimiento de servidores";
            tipo_solicitudServicio.value = "Servicio";
            descripcion_servicio.value = "Revisión y mantenimiento de servidores en la empresa.";
            tipoServicio.value = "urgente";
            descripcion.value = "Revisión y mantenimiento de servidores en la empresa.";
            presupuesto_servicio.value = "1500 USD";
            linkDrive.value = "https://drive.google.com/servicio";
            archivo.value = "📎 | Especificaciones técnicas.pdf";
        } else if (tipoSolicitud.value === "proveedor") {
            titulo.value = "Expertos en servidores";
            trabajo.value = "Mantenimiento de servidores";
            detalles.value = "Revisión y mantenimiento de servidores en la empresa.";
            conocimientos.value = "Conocimientos en servidores y redes.";
            cursos.value = "Certificación en servidores.";
            tiempo.value = "1 semana";
            descripcion.value = "Revisión y mantenimiento de servidores en la empresa.";
            linkDrive.value = "https://drive.google.com/proveedor";
            archivo.value = "📎 | archivo.pdf";
        }
    });

    function resetFormulario() {
        // Restablecer los valores de los campos
        document.getElementById('titulo').value = '';
        document.getElementById('nombre').value = '';
        document.getElementById('modelo').value = '';
        document.getElementById('marca').value = '';
        document.getElementById('cantidad').value = '';
        document.getElementById('presupuesto').value = '';
        document.getElementById('descripcion').value = '';
        document.getElementById('link_drive').value = '';
    }

     // Evento de clic en el botón Guardar
     guardarBtn.addEventListener("click", function () {
        if (!guardarBtn.hasAttribute("disabled")) {
            // Mostrar el modal de éxito
            mensajeExito.classList.remove("hidden");
        }
    });

     // Cerrar el modal cuando se haga clic en el botón "Cerrar"
    cerrarModal.addEventListener("click", function () {
        mensajeExito.classList.add("hidden");
        window.location.href = "/comprador/solicitudes";
    });
});
