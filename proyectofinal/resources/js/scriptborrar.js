function hacerdelete(id) {
    if (confirm("Va a eliminar el Dispositivo. Desea continuar?")) {
        //document.formdelete.submit();
        document.getElementById("formdelete"+id).submit();

    }

  }