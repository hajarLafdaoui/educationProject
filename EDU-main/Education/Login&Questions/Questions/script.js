let userEditor; // Define a variable to hold the editor instance.

ClassicEditor
    .create(document.querySelector('#content'))
    .then(editor => {
        userEditor = editor; // Store editor instance.
        editor.model.document.on('change:data', () => {
            const data = editor.getData();
            const publishBtn = document.querySelector("#publish");
            if (data.trim().length > 0) {
                publishBtn.removeAttribute("disabled");
                publishBtn.classList.add("abled");
            } else {
                publishBtn.setAttribute("disabled", "disabled");
                publishBtn.classList.remove("abled");
            }
        });
    })
    .catch(error => {
        console.error(error);
    });
