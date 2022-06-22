function MyUploadAdapterPlugin( editor ) {

editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
    return {
        upload() {
            return loader.file.then(file => new Promise((resolve, reject) => {
                const data = new FormData();
                data.append('file', file);

                axios({
                    url: '/upload',
                    method: 'post',
                    data,
                    headers: {
                        'Content-Type': 'multipart/form-data;'
                    },
                    withCredentials: false
                }).then(response=>{
                    resolve({
                        default:response.data.url
                    })
                })

                /*.then(response => {
                    console.log(response.data.url)
                    if (response.data.data.url == true) {
                        resolve({
                            default: response.data.url
                        });
                    } else {
                        reject(response.data.message);
                    }
                })*/
                .catch(response => {
                    reject('Upload '+ file['name'] + ' failed');
                });
            }))


        },
        abort(){}
    }
};
}

function initEditor(myId){
    ClassicEditor
        .create( myId, {
            extraPlugins: [ MyUploadAdapterPlugin ],
        })
        .then( function(editor){
            editor.model.document.on('change:data', () => {
                    Livewire.emit('input',{
                        value: editor.getData(),
                        field: "{{  $body }}",
                    })
            })
        })


}

