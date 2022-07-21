(function($) {
    console.info("The plugin is working");

    console.info("The REST API root is "+WPsettings.root)
    console.info("The nonce value is "+WPsettings.nonce)
    console.info("The current post id "+WPsettings.current_ID)

    // Cria os dois botões de salvar
    const $ENTRYTITLE = $('.entry-title');
    $ENTRYTITLE.after(`
        <button class="edit-button edit-title"> Edit title </button>
        <button class="edit-button save-title" style="displaY: none;"> Save title </button>
    `);

    // Cria os eventos do botão de editar
    $('.edit-button.edit-title').click(function () {
        let $originalTitle = $ENTRYTITLE.text();
        $ENTRYTITLE.toggle();
        $ENTRYTITLE.after('<input id="title-input" type="text">');
        document.querySelector('#title-input').value = $originalTitle;
        $(this).toggle(); //this nesse caso o edit-title button
        $('.edit-button.save-title').toggle();
    });

    // Cria os eventos do botão de salvar
    $('.save-title').click(function(){
        let newTitle = document.querySelector('#title-input').value;
        $ENTRYTITLE.text(newTitle);
        $ENTRYTITLE.toggle();
        $('#title-input').toggle();
        $('.edit-title.edit-button').toggle();
        $(this).toggle(); //this nessa caso é o save-title button
        runAjax(newTitle);
    });

    function runAjax(newTitle) {
        $.ajax({
            url: WPsettings.root + 'wp/v2/pokemon/' + WPsettings.current_ID,
            method: 'POST',
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-WP-Nonce', WPsettings.nonce)
            },
            data: {
                'title': newTitle
            }
        })
    }

})(jQuery)