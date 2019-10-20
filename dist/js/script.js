$(function() {
    $('#cep').on('blur', function(e) {
        $.ajax({
            url: "https://viacep.com.br/ws/" + $('#cep').val() + "/json",
            type: "GET",
            beforeSend: function() {
                $('#endereco').attr('disabled', '').val('Carregando...');
                $('#bairro').attr('disabled', '').val('Carregando...');
                $('#cidade').attr('disabled', '').val('Carregando...');
                $('#estado').attr('disabled', '').val('Carregando...');
                $('#pais').attr('disabled', '').val('BR');
            },
            success: function(e) {
                console.log(e);
                $('#endereco').removeAttr('disabled').val(e.logradouro);
                $('#bairro').removeAttr('disabled').val(e.bairro);
                $('#cidade').removeAttr('disabled').val(e.localidade);
                $('#estado').removeAttr('disabled').val(e.uf);
                $('#pais').removeAttr('disabled').val('BR');
            }
        });
    });
});

