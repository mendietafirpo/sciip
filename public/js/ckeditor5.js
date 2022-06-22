function MyUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return {
            upload() {
                return loader.file.then(file => new Promise((resolve, reject) => {
                    let form_data = new FormData();

                    form_data.append('file',file);

                    axios.post("{{ route('upload') }}",form_data,{
                        headers:{'Content-Type':'multipart/form-data'}
                    }).then(response=>{
                        resolve({
                            default:response.data
                        })
                    })
                }))

            },
            abort(){}
        }
    };
}

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        extraPlugins: [ MyUploadAdapterPlugin ],
    } )

    .then( function(editor){
        editor.model.document.on('change:data', () => {
            //let note = $('#note').data('note');
            //@this.set('body', editor.getData());
            document.getElementById('body').value = editor.getData();
            //document.querySelector('#submit').addEventListener('click',() => {
            // let note = $('#note').data('note');
            //  eval(note).set('state.note',editor.getData());
            //});
           })

        })


    .catch(error => {
        console.error(error);
    });
