

{{--  <input type="file" class="form-control " id="files_input" onchange="uploadFiles(event ,'files')"  name="files[]" multiple  >  --}}
{{--  <div class="files_uploader_container  p-2" id="files_cont"> </div>  --}}

<script>
    let inputsFiles = {}
    $('.files-input').on('change' ,function(event){
        let input = $(this).data('input');
        const selectedFilesCont = document.getElementById(input + "_cont");
        if(!!inputsFiles[input]){
            let files = new DataTransfer();
            for(let i = 0 ; i < event.target.files.length ;i++){
                files.items.add(event.target.files[i]);
            }
            for(let i = 0 ; i < inputsFiles[input].length ;i++){
                files.items.add(inputsFiles[input][i]);
            }
            inputsFiles[input] = files.files;
            selectedFilesCont.innerHTML = '';
        }else{
            inputsFiles[input] = event.target.files;
        }
        if(!!inputsFiles[input] && inputsFiles[input].length > 0){
            for(let i = 0 ; i < inputsFiles[input].length ;i++){
                const fileType = inputsFiles[input][i].type.split("/")[0];
                if(fileType === "image"){
                    let src = null;
                    let reader = new FileReader();
                    reader.onload = function(e){
                        src = e.target.result;
                        $('#' + input + "_cont").append(`<div class="files_uploader_element" >
                            <div>
                                <div><img src="${src}" alt=""></div>
                            </div>
                            <div class="files_uploader_delete_file" onclick="deleteFile(this ,'${inputsFiles[input][i].name}' ,'${input}')">
                                <i class="fa fa-trash"></i>
                            </div>
                        </div>`);
                    }
                    reader.readAsDataURL(inputsFiles[input][i]);
                }else{
                    $('#' + input + "_cont").append(`<div class="files_uploader_element " >
                        <div>
                            <div class="element_text"> <span class="m-1" style="font-size:20px"><i class="fa fa-file"></i></span> ${ inputsFiles[input][i].name} </div>
                        </div>
                        <div class="files_uploader_delete_file" onclick="deleteFile(this ,'${inputsFiles[input][i].name}' ,'${input}')">
                            <i class="fa fa-trash"></i>
                        </div>
                    </div>`);
                }
            }     
        }
        event.target.files = inputsFiles[input];
    });

    function deleteFile(ele ,name ,input){
        let filesInput = document.getElementById(input + "_input")
        let files = new DataTransfer();
        let deleted = null;
        for(let i = 0 ; i < filesInput.files.length ;i++){
            if(filesInput.files[i].name == name && deleted != name){
                deleted = name;
                continue;
            }
            files.items.add(filesInput.files[i]);
        }
        filesInput.files   = files.files; 
        inputsFiles[input] = files.files; 
        $(ele).parent().remove();
    }
</script>