
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then(editor => {
        editor.model.document.on('change:data',()=>{
        //document.querySelector('#body').value = editor.getData();
        @this.set('body', editor.getData())

        })

    })
    .catch(error => {
        console.error( error );
    });

    //wire:click="$set('body', document.querySelector('#editor').value)"
/*
    ClassicEditor
        .create(document.querySelector('#body'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('body', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });


    ClassicEditor
    .create(document.querySelector('#body'))
    .then(editor => {
        document.querySelector("#submit").addEventListener("click", () => {
            const textareaValue = $("#body").data("body");
            eval(textareaValue).set("body", editor.getData());
            // @this.set('message', editor.getData());
        });
    })
    .catch(error => {
        console.error(error);
    });
*/
